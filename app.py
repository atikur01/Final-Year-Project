import os
import base64

def obfuscate_php_file(file_path):
    try:
        with open(file_path, 'r') as f:
            php_code = f.read()
        
        # Base64 encode the PHP code
        obfuscated_code = "<?php eval(base64_decode('" + base64.b64encode(php_code.encode()).decode() + "')); ?>"
        
        with open(file_path, 'w') as f:
            f.write(obfuscated_code)
        
        print("Obfuscated:", file_path)
    except Exception as e:
        print("Error obfuscating:", file_path, "-", str(e))

def obfuscate_php_directory(directory):
    for root, dirs, files in os.walk(directory):
        for file in files:
            if file.endswith(".php"):
                file_path = os.path.join(root, file)
                obfuscate_php_file(file_path)

# Example usage: obfuscate PHP files in the "php_directory" directory
obfuscate_php_directory("/")
