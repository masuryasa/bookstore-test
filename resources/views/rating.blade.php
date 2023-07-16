<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Rating</title>
</head>
<body>
    <div class="container">
        <h1>Ratings</h1>  
        <div class="row">
            <div class="col-4">
                <form action="post-rating" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <label for="author" class="form-label">Book Author</label>
                        <select name="author" id="author" class="form-select">
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="input-group mb-3">
                        <label for="book" class="form-label">Book Name</label>
                        <select name="book" id="book" class="form-select">
                            <option>Choose the author's book</option>
                        </select>
                    </div>
                    
                    <div class="input-group mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select name="rating" id="rating" class="form-select">
                            @foreach (range(1,10) as $rate)
                                <option value="{{ $rate }}">{{ $rate }}</option>
                            @endforeach
                        </select>
                    </div>

                        <input type="submit" class="btn btn-primary" value="SUBMIT">
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('#author').change(function() { 
            var author_id = $(this).val();

            $.ajax({
                type: 'GET',
                url: 'get-books',
                data: {'author_id':author_id},
                success: function(response) {
                    var options = '';

                    $.each(response, function(key, value) {
                        options += '<option value="' + value.id + '">' + value.title + '</option>';
                    });

                    $('#book').html(options); 
                }
            });
        });
    });
    
    </script>
</body>
</html>