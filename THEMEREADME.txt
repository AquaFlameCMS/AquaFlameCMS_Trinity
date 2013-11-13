To Enable Theme Uploads You Must Change Two values within your php.ini file.

 ; Maximum size of POST data that PHP will accept.
; Its value may be 0 to disable the limit. It is ignored if POST data reading
; is disabled through enable_post_data_reading.
; http://php.net/post-max-size
post_max_size=0M

^_Change Above Value in your php.ini

; Maximum allowed size for uploaded files.
; http://php.net/upload-max-filesize
upload_max_filesize=32M
^_Change Above Value in your php.ini.

The Standard Theme Zip is Roughly 25MB in size.