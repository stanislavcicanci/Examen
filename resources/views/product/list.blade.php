<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List</title>
</head>
<body>
    <div class="continut">
        <div class="cont_log">
                <h3 class="text-center">All</h3>
            @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        </div>

    <div class="content_tot">
    <div class="adaug">
        <a href={{ route('products.create') }} style="text-decoration: none; color: green;"> Add</a>  
        <div class="continutul mt-3">
            <table class="table table-bordered table-striped table-hover border-dark">
            <tr>
                <th class="text-center" >Id</th>
                <th class="text-center">Name</th>
                <th class="text-center">Description</th>
                <th class="text-center">Image</th>
                <th colspan="2" class="text-center">Action</th>
            </tr>
            @foreach ($products as $product)

            <tr class="text-left">
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->img }}</td>
                <td><a href={{ route('products.edit', $product->id) }}><i class="bi bi-pencil-square" style="color: #307FD9"></i></a></td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="border: none; outline: none; background-color: transparent;"><i class="bi bi-trash-fill" style="color: #5E1A1A"></i></button>
                    </form>
                    
                </td>
            </tr>
            
            @endforeach
        </table>
        {{ $products->links() }}
        </div>
    </div>
    </div>
</div>
</body>
</html>