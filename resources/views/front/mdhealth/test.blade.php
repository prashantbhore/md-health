@extends('front.layout.layout2')
@section('content')
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
@endsection
@section('script')
    <script>
        var apiKey = 'sandbox-BOhpAyMe4ewgstkrnmQbhLnrI7kMlTfD'
        var secretKey = 'sandbox-5F4PXtaQLl8nxj4m2r8HRcQ9xT3NCe2S'
        alert(apiKey);
        var binNumber = {
            locale: null,
            conversationId: null,
            binNumber: null,
        };

        function nullClear(obj) {
            for (var member in obj) {

                if (obj[member] === null) {
                    delete obj[member];
                } else if (typeof obj[member] === 'object') {
                    obj[member] = nullClear(obj[member]);
                    if (Object.keys(obj[member]).length === 0) {
                        delete obj[member];
                    }
                }
            }

            return obj;
        }

        //Set json string to model
        function jsonToObj(jsonString, obj) {
            var parsedJsonString = JSON.parse(jsonString)
            for (var key in parsedJsonString) {
                if (parsedJsonString.hasOwnProperty(key)) {
                    if (typeof parsedJsonString[key] === 'object') {
                        if (Array.isArray(parsedJsonString[key])) {
                            for (var i = 0; i < parsedJsonString[key].length; i++) {
                                if (key == "basketItems") {
                                    obj[key].push(new BasketItem());
                                    obj[key][i] = jsonToObj(JSON.stringify(parsedJsonString[key][i]), obj[key][i])
                                } else {
                                    obj[key][i] = parsedJsonString[key][i];
                                }
                            }
                        } else {
                            obj[key] = jsonToObj(JSON.stringify(parsedJsonString[key]), obj[key])
                        }
                    } else {
                        obj[key] = parsedJsonString[key];
                    }

                }
            }
            obj = nullClear(obj);

            return obj;
        }

        //generate pki string of object
        function generateRequestString(obj) {
            var isArray = Array.isArray(obj);

            var requestString = '[';
            for (var i in obj) {
                var val = obj[i];
                if (!isArray) {
                    requestString += i + '=';
                }
                if (typeof val === 'object') {
                    requestString += generateRequestString(val);
                } else {
                    requestString += val;
                }
                requestString += isArray ? ', ' : ',';
            }
            requestString = requestString.slice(0, (isArray ? -2 : -1));
            requestString += ']';
            return requestString;

        }

        //generate authorization string
        function generateAuthorizationString(obj) {
            var requestString = generateRequestString(obj);
            var hashSha1 = CryptoJS.SHA1(apiKey + request.headers["x-iyzi-rnd"] + secretKey + requestString);
            var hashInBase64 = CryptoJS.enc.Base64.stringify(hashSha1);
            var authorization = "IYZWS" + " " + apiKey + ":" + hashInBase64;
            console.log(requestString);
            // postman.setGlobalVariable("pkiString", apiKey + request.headers["x-iyzi-rnd"] + secretKey + requestString);
            return authorization
        }

        var requestModel = binNumber;
        const jsonDataPath = 'resources/views/front/mdhealth/test-data.json';
        fetch(jsonDataPath)
            .then(response => response.json())
            .then(data => {
                // Use the loaded JSON data in your code
                alert(data);
            })
            .catch(error => console.error('Error loading JSON data:', error));

        requestModel = jsonToObj(data, requestModel);
        var authorization = generateAuthorizationString(requestModel)
        console.log(authorization);
        alert('hi00');
        // postman.setGlobalVariable("authorization", authorization);
    </script>
@endsection
