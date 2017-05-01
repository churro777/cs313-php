<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>

        <form class="" action="output.php" method="post">
            <label>Name</label>
            <input type="text" name="name" />
            <br>

            <label>Email Address</label>
            <input type="email" name="email" />
            <br>

            <input type="radio" name="major" value="CS" /><label>Computer Science</label>
            <input type="radio" name="major" value="WDD"/><label>Wed Design & Development</label>
            <input type="radio" name="major" value="CIT"/><label>Computer Information Technology</label>
            <input type="radio" name="major" value="CE"/><label>Computer Engineering</label>

            <br>

            <input type="checkbox" name="visited[]" value="NA"/><label>North America</label>
            <input type="checkbox" name="visited[]" value="SA"/><label>South America</label>
            <input type="checkbox" name="visited[]" value="EU"/><label>Europe</label>
            <input type="checkbox" name="visited[]" value="AS"/><label>Asia</label>
            <input type="checkbox" name="visited[]" value="AU"/><label>Australia</label>
            <input type="checkbox" name="visited[]" value="AF"/><label>Africa</label>
            <input type="checkbox" name="visited[]" value="AN"/><label>Antartica</label>

            <br />

            <label>Comments:</label>
            <input type="textbox" name="comments"/>

            <br>

            <input type="submit" />

        </form>

    </body>
</html>
