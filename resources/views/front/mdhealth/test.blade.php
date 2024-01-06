<form id="myForm" action="{{ url('/test') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="company_name">Company Name:</label>
    <input type="text" id="company_name" name="company_name"><br><br>

    <label for="city_id">City ID:</label>
    <input type="text" id="city_id" name="city_id"><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email"><br><br>

    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone"><br><br>

    <label for="tax_no">Tax Number:</label>
    <input type="text" id="tax_no" name="tax_no"><br><br>

    <label for="company_address">Company Address:</label>
    <input type="text" id="company_address" name="company_address"><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>

    <label for="company_logo_image_path">Company Logo Image Path:</label>
    <input type="file" id="company_logo_image_path" name="company_logo_image_path"><br><br>

    <label for="company_licence_image_path">Company Licence Image Path:</label>
    <input type="file" id="company_licence_image_path" name="company_licence_image_path"><br><br>

    <input type="submit" value="Submit">
</form>
