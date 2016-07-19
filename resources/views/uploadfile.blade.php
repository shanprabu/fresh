<!doctype HTML>
<html>
    <head>
        <title>Test Upload</title>
    </head>
    <body>
        <form enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <p>Select a file to upload</p>
            <input type="file" name="photo"/>
            <input type="submit" value="Upload">
        </form>
    </body>
</html>