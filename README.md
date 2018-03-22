# OnEarthProject
To create a HTTP service that accepts POST as PDF files and fetches urls of the image files of that pdf

create an HTTP service which
1. Accepts POST requests containing PDF files,
2. Returns a manifest of URLs to PNG images of the pages of the PDF, and
3. Responds to GET requests for those URLs, returning the corresponding PNG.
