<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Index</title>
</head>
<body>
    <div class="container">
        <h1>List Index</h1>
        <div class="row">
            <div class="col-4">
                <form action="">
                    <div class="input-group mb-3">
                        <label for="number" class="form-label">List Shown</label>
                        <select name="number" class="form-select" id="number">
                            @for ($num=10; $num<=100; $num+=10)
                                <option value="{{ $num }}" @if ($num == $number) selected @endif>{{ $num }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="input-group mb-3">
                        <label for="keyword" class="form-label">Search</label>
                        <input type="text" class="form-control" name="keyword" id="keyword" value="{{ $keyword }}">
                    </div>

                    <input type="submit" class="btn btn-primary" value="SUBMIT">
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Book Name</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Author Name</th>
                            <th scope="col">Average Rating</th>
                            <th scope="col">Voter</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $idx => $book)
                            </tr>
                                <th scope="row">{{ $idx+1 }}</th>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->category->name }}</td>
                                <td>{{ $book->author->name }}</td>
                                <td>{{ $book->avg_rating }}</td>
                                <td>{{ $book->ratings_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>