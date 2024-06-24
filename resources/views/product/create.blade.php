<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Creare</title>
    <style>
        body {
            font-family: Arial, sans-serif; 
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; 
        }

        .continut {
            padding: 20px;
        }

        .cont_log {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .elem_create {
            background-color: #ffffff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 5px;
            margin-bottom: 10px;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .text-danger {
            color: #dc3545;
            font-size: 14px;
            margin-top: 5px;
        }


        @media only screen and (max-width: 600px) {
            .elem_create {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="continut">
        <div class="cont_log">
            <h3 class="text-center">Add</h3>
        </div>
    </div>
    <form action="{{ route('products.store') }}" method="POST" name="add_product" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="elem_create">
            <h3>Name</h3>
            <input type="text" name="name" placeholder="Enter name">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
        <div class="elem_create">
            <h3>Description</h3>
            <textarea name="description" cols="50" rows="10" placeholder="Enter description"></textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
        <div class="elem_create">
            <h3>Img</h3>
            <input type="text" name="img" placeholder="Enter img">
            <span class="text-danger">{{ $errors->first('img') }}</span>
        </div>
        
        <div class="elem_create">
            <button type="submit">Create</button>
        </div>
    </form>
</body>
</html>
