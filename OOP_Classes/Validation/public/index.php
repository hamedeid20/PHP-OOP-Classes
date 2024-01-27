<?php 

    namespace Validation; 
    use Support\Session;
    use Validation\Validator\Validator; 

    ini_set('display_errors', 'on');

    if(!defined('DS')){
        define('DS', DIRECTORY_SEPARATOR);
    }

    require_once ".." . DS . "App" . DS . "Support" . DS . "Config.php";
    require_once APP_PATH . "Support" . DS . "Helper.php";
    require_once APP_PATH . "Support" . DS . "Autoload.php"; 

    $session = new Session();
    
    

    if(isset($_POST['btn_login'])){ 

        if(request()->method() === 'post'){ 
            $validator = new Validator();

            $validator->setRules([
                'email_login' => 'email|required|between:10,30|max:30|unique:users,email',
                'password_login' => 'password|required|between:8,16|max:16'
            ]); 

            $validator->setAliases([
                'email_login' => 'Email',
                'password_login' => 'Password'
            ]);

            $validator->make(request()->all());

            if(!$validator->passes()){ 
                $session->setFlash('errors', $validator->errors());
                $session->setFlash('old', request()->all());
                return back();
            }

            // Complete Login Transaction HERE ......

            $session->setFlash('success', 'Login Successfully');
            

        }else{
            $session->setFlash('transaction_error', 'Only POST Method Allowed');
        }

    } else if(isset($_POST['btn_register'])){

        if(request()->method() === 'post'){ 
            $validator = new Validator();

            $validator->setRules([
                'username_register' => 'username|between:8,15|max:15|unique:users,username',
                'email_register' => 'email|required|between:10,30|max:30|unique:users,email',
                'password_register' => 'password|required|between:8,16|max:16'
            ]); 

            $validator->setAliases([
                'username_register' => 'UserName',
                'email_register' => 'Email',
                'password_register' => 'Password'
            ]);

            $validator->make(request()->all());

            if(!$validator->passes()){ 
                $session->setFlash('errors', $validator->errors());
                $session->setFlash('old', request()->all());
                return back();
            }

            // Complete Register Transaction HERE ......

            $session->setFlash('success', 'Register Successfully');
            
        }else{
            $session->setFlash('transaction_error', 'Only POST Method Allowed');
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head >
        <title style="color: brown">Vulnerabilities</title>
        <meta name="author" content="Zaur">
        <meta descryption content="Presentation of website">
        <meta name="keywords" content="technology, cyber security, software">
        <!-- <meta http-equiv="refresh" content="100"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>

        <div class="message_alert">
            <span class="help__text">
                <?php 
                    if($session->hasFlash('transaction_error')){
                        echo ($session->getFlash('transaction_error'));
                    }elseif($session->hasFlash('errors')){
                        foreach($session->getFlash('errors') as $field => $values){
                            echo "<h3> Field : " . $field . "</h3> <br>";
                            foreach($values as $val){
                                echo $val . "<br>";
                            }
                        }
                    }elseif($session->hasFlash('success')){
                        echo "<h3> ". $session->getFlash('success') ." </h3>";
                    }
                ?>
            </span>
        </div>

        <div class="container" id="container">

            <div class="form-container  sign-up-container">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="header">Sign Up</div>
                    
                    <div class="button-input-group">
                        <div class="group input-group">
                        <input type="text" placeholder="UserName" name="username_register" value="<?= old('username_register', $session); ?>">
                    </div>
                    <div class="group input-group">
                        <input type="email" placeholder="Email" name="email_register" value="<?= old('email_register', $session); ?>">
                    </div>
                    <div class="group input-group">
                        <input type="password" placeholder="Password" name="password_register" value="<?= old('password_register', $session); ?>">
                    </div>
                    <div class="group button-group">
                        <button class="signup-btn" name="btn_register">Sign Up</button>
                    </div>
                    </div>
                    
                </form>
            </div>
            
            <div class="form-container  sign-in-container">
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="header">Sign In</div>
                    
                    <div class="button-input-group">
                        <div class="group input-group">
                            <input type="text" placeholder="Email" name="email_login" value="<?= old('email_login',$session); ?>">
                        </div>
                        <div class="group input-group">
                            <input type="password" placeholder="Password" name="password_login" value="<?= old('password_login', $session); ?>">
                        </div>
                        <div class="group button-group">
                            <button class="signin-btn" name="btn_login">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>Please login your personal info</p>
                        
                    <div class="group button-group">
                        <button class="ghost" id="signIn">Sign in</button>
                    </div>
                        <footer>
                            <p>Inspired by <a href="https://codepen.io/Rittenhouse" target="_blank">Zaur Suleymanlı</a></p>
                        </footer>
                    </div>
                    
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start your journey with us</p>
                        
                    <div class="group button-group">
                        <button class="ghost" id="signUp">Sign up</button>
                    </div>
                        <footer>
                            <p>Inspired by <a href="https://codepen.io/Rittenhouse" target="_blank">Zaur Suleymanlı</a></p>
                        </footer>
                    </div>
                </div>
            </div>
        
        </div>
        
        <script src="script.js"></script>
    </body>
</html>