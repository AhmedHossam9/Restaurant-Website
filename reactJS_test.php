<?php

session_start();
$email = $_SESSION["email"];

?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>React Basics</title>
  <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
  <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
  <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
</head>
<body>
  <div id="app"></div>
  <script type="text/babel">
    class App extends React.Component {
      state = {
        name: '<?php echo $email;?>',
        age: 30
      }
      render(){
        return(
          <div className="app-content">
            <h1>Hello, ninjas!</h1>
            <p>My name is: { this.state.name } and I am { this.state.age }</p>
          </div>
        )
      }
    }

    ReactDOM.render(<App />, document.getElementById('app'));
  </script>
</body>
</html>