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
    <h1>Add New Pet</h1>

    <form action="{{ route('pets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="sex">Sex</label>
            <select name="sex" class="form-control" >
                <option value="1" {{ old('sex') == 1 ? 'selected' : '' }}>d</option>
                <option value="2" {{ old('sex') == 2 ? 'selected' : '' }}>c</option>
            </select>
            @if ($errors->has('sex'))
                <span class="text-danger">{{ $errors->first('sex') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="species">Species</label>
            <input type="text" name="species" class="form-control" value="{{ old('species') }}" >
            @if ($errors->has('species'))
                <span class="text-danger">{{ $errors->first('species') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control" value="{{ old('age') }}" >
            @if ($errors->has('age'))
                <span class="text-danger">{{ $errors->first('age') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="customer_id">Customer phone</label>
            <select name="customer_id" class="form-control" >
                <option selected>phone customer</option>
                @foreach($formattedUsers as $user)
                    <option
                        value="{{ $user['id'] }}" >{{ $user['phone_number'] }}</option>
                @endforeach
            </select>
            @if ($errors->has('customer_id'))
                <span class="text-danger">{{ $errors->first('customer_id') }}</span>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
