import re

url_base = 'https://themewagon.github.io/direngine/'

with open('scratch_direngine.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Replace href and src attributes
content = re.sub(r'href="css/', f'href="{url_base}css/', content)
content = re.sub(r'src="js/', f'src="{url_base}js/', content)
content = re.sub(r'src="images/', f'src="{url_base}images/', content)

# Replace url() in styles
content = re.sub(r"url\('images/", f"url('{url_base}images/", content)
content = re.sub(r"url\(images/", f"url({url_base}images/", content)

with open('resources/views/welcome.blade.php', 'w', encoding='utf-8') as f:
    f.write(content)

print('Done processing HTML and writing to welcome.blade.php.')
