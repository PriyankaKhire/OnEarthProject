# OnEarthProject
To create a HTTP service that accepts POST as PDF files and fetches urls of the image files of that pdf

create an HTTP service which
1. Accepts POST requests containing PDF files,
2. Returns a manifest of URLs to PNG images of the pages of the PDF, and
3. Responds to GET requests for those URLs, returning the corresponding PNG.

Solution:
The final project is uploaded in final.php
To run this project you will need the latest image magick, it can be downloaded from https://www.imagemagick.org
Once you have downloaded imagemagick, please go to cmd and verify if magick -version displays the correct version of imagemagick.
