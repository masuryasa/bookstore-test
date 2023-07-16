<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Authors</title>
</head>
<body>
    <div class="container">
        <h1>Top 10 Most Famous Authors</h1>
        <div class="row">
            <div class="col-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Author Name</th>
                            <th scope="col">Voter</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $idx => $author)
                            </tr>
                                <th scope="row">{{ $idx+1 }}</th>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->ratings_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>