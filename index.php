<?php
    //if, else-if, case, switch, etc
    //estructuras de control, funciones, arrays, cadenas
    if (isset($_GET['priority']))
        $priority = $_GET['priority'];
    else
        $priority = 'high';

    $todos = array(
        array(
            'id' => 1,
            'priority' => 'low',
            'title' => 'Nullam dapibus et',
            'description' => 'Curabitur varius a orci sit amet pharetra. Aenean luctus eget.',
            'complete' => false
        ),
        array(
            'id' => 2,
            'priority' => 'high',
            'title' => 'Mauris tempor fringilla',
            'description' => 'Vivamus sit amet felis ut enim volutpat cursus scelerisque eu.',
            'complete' => false
        ),
        array(
            'id' => 3,
            'priority' => 'normal',
            'title' => 'Nunc ac sem',
            'description' => 'Duis viverra vitae dui in maximus. Interdum et malesuada fames.',
            'complete' => false
        ),
        array(
            'id' => 4,
            'priority' => 'low',
            'title' => 'Duis dictum non',
            'description' => 'Curabitur vitae erat felis. Morbi eu arcu egestas, pharetra dui.',
            'complete' => false
        ),
        array(
            'id' => 5,
            'priority' => 'low',
            'title' => 'Cras interdum malesuada',
            'description' => 'Quisque libero purus, ultricies ac ex vel, fermentum interdum risus.',
            'complete' => true
        ),
        array(
            'id' => 6,
            'priority' => 'high',
            'title' => 'Donec posuere rutrum',
            'description' => 'Cras tincidunt libero ligula, sodales vestibulum augue faucibus et. Morbi.',
            'complete' => true
        ),
        array(
            'id' => 7,
            'priority' => 'low',
            'title' => 'Orci varius natoque',
            'description' => 'Aliquam et enim venenatis, vestibulum dui blandit, porttitor nisi. Etiam.',
            'complete' => false
        ),
        array(
            'id' => 8,
            'priority' => 'high',
            'title' => 'Mauris eu volutpat',
            'description' => 'Vestibulum ac ex vitae orci maximus tincidunt sed semper lectus.',
            'complete' => false
        ),
        array(
            'id' => 9,
            'priority' => 'low',
            'title' => 'Morbi at tellus',
            'description' => 'Suspendisse vulputate enim in urna ultrices, vitae facilisis est ultricies.',
            'complete' => false
        ),
        array(
            'id' => 10,
            'priority' => 'normal',
            'title' => 'Donec at tristique',
            'description' => 'Duis est ligula, rhoncus a felis eu, cursus egestas nisl.',
            'complete' => false
        ),
    );

    function filterTodos ($todos, $priority) {
        $selected = [];
        foreach($todos as $todo) {
            if(!array_search($priority, $todo) === false)
                $selected[] = $todo;
        }
        return $selected;
    }


    $selectedTodos = filterTodos($todos, $priority);
    //<span class="badge badge-primary">Primary</span>
    switch($priority) {
        case 'low':
            $badge = 'secondary';
            break;
        case 'normal':
            $badge = 'warning';
            break;
        default:
            $badge = 'danger';
    }
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>ToDo List</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="?priority=high">High</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?priority=normal">Normal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?priority=low">Low</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid">        
        <div class="container">
            <h1 class="display-4">ToDo List</h1>
            <p class="lead">You're seeing ToDos with <?php echo $priority; ?> priority</p>
            <p class="lead"> Select another priority in the navigation bar</p>
                <?php
                    foreach($selectedTodos as $todo) {
                        $todoObject = (object) $todo;
                        include('card.php');
                    }
                ?>
            </div>
        </div>
        
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>