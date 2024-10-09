<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medicine</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h2>Add Medicine</h2>
    <form action="{{ route('medicines.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="type">Type:</label>
            <input type="text" class="form-control" id="type" name="type">
            @if ($errors->has('type'))
                <span class="text-danger">{{ $errors->first('type') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="cost">Cost:</label>
            <input type="number" class="form-control" id="cost" name="cost" step="0.01">
            @if ($errors->has('cost'))
                <span class="text-danger">{{ $errors->first('cost') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="type">status:</label>
            <input type="number" class="form-control" id="type" name="status">
            @if ($errors->has('status'))
                <span class="text-species">{{ $errors->first('status') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="cost">quantity:</label>
            <input type="number" class="form-control" id="cost" name="quantity" step="1">
            @if ($errors->has('quantity'))
                <span class="text-danger">{{ $errors->first('quantity') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="manufacture_date">Manufacture Date:</label>
            <input type="date" class="form-control" id="manufacture_date" name="manufacture_date">
            @if ($errors->has('manufacture_date'))
                <span class="text-danger">{{ $errors->first('manufacture_date') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="expiry_date">Expiry Date:</label>
            <input type="date" class="form-control" id="expiry_date" name="expiry_date">
            @if ($errors->has('expiry_date'))
                <span class="text-danger">{{ $errors->first('expiry_date') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
