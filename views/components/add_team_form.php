<form method="POST" enctype="multipart/form-data" action="../controllers/add_members.controller.php">
    <table>
        <tr>
            <td>Name</td>
            <td> <input type="text" placeholder="Enter Name" name="membername" required> </td>
        </tr>
        <tr>
            <td>Profile Picture</td>
            <td> <input type="file" id="profpic" name="profpic"> </td>
        </tr>
        <tr>
            <td> Position </td>
            <td>
                <select name="mpos">
                    <option value="None">Select a Position</option>
                    <option value="CEO">CEO</option>
                    <option value="Manager">Manager</option>
                    <option value="Vice-Manager">Vice-Manager</option>
                    <option value="Member">Member</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Qualification</td>
            <td> <input type="text" placeholder="Qualification" name="qualification" required> </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">About</td>
            <td> <textarea name="about" placeholder="About" cols="20" rows="2"></textarea> </td>
        </tr>
    </table>
            <input type="submit" value="Submit">
</form>
