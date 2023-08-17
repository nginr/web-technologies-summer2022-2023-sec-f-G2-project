<form method="POST" enctype="multipart/form-data" action="../controllers/insert_book.controller.php">
    <table>
        <tr>
            <td>Name</td>
            <td> <input type="text" placeholder="Enter Book Name" id="bookname" name="bookname" required> </td>
        </tr>
        <tr>
            <td> Category </td>
            <td>
                <select id="bookcategory" name="bookcategory">
                    <option value="None">Select a Category</option>
                    <?php getcategories('admin'); ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>PDF </td>
            <td>  <input type="file" id="book" name="book" accept=".pdf"> </td>
        </tr>
        <tr>
            <td style="vertical-align: top;">Description</td>
            <td>
                <textarea id="desc" name="desc" placeholder="Description" cols="20" rows="2"></textarea>
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Submit">
</form>
