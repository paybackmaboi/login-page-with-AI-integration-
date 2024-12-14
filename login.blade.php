<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <style>
        body {
            background-color: #f8f9fa;
            background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.90) 100%), url('bcccc.jpg');
            background-position: center;
            background-size: cover;
            padding: 50px 15px;
            background-attachment: fixed;
            
        }
        .card {
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #eee;
            padding: 20px;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .alert {
            margin-bottom: 15px;
        }
        select.form-control {
            height: calc(1.5em + .75rem + 2px);
        }
    </style>

    <script>
        $(document).ready(function() {
            // If there's an error message
            if ($('.alert').length > 0) {
                // Hide it after 2 seconds
                setTimeout(function() {
                    $('.alert').fadeOut('slow', function() {
                        // After fade out, remove the element
                        $(this).remove();
                    });
                    // Reset the form
                    $('form')[0].reset();
                }, 1000);
            }
        });
    </script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <i class="fas fa-lock"></i> Login
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first('message') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username</label>
                                <select class="form-control" id="username" name="username" required>
                                    <option value="">Select User</option>
                                    <option value="admin">Admin</option>
                                    <option value="user1">User 1</option>
                                    <option value="user2">User 2</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                            <a href="{{ route('welcome') }}" class="btn btn-secondary btn-block">Exit</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>