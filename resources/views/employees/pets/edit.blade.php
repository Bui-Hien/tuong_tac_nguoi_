<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Medicine</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h1>Edit Pet</h1>

    <form action="{{ route('pets.update', $pet->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $pet->name }}" required>
        </div>
        <div class="form-group">
            <label for="sex">Sex</label>
            <select name="sex" class="form-control" required>
                <option value="1" {{ $pet->sex == 1 ? 'selected' : '' }}>Male</option>
                <option value="2" {{ $pet->sex == 2 ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="species">Species</label>
            <input type="text" name="species" class="form-control" value="{{ $pet->species }}" required>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" class="form-control" value="{{ $pet->age }}" required>
        </div>
        <div class="form-group">
            <label for="customer_id">Customer</label>
            <input type="number" name="customer_id" class="form-control" value="{{ $pet->customer_id }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

</body>
</html>
