<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<?php
/**
 * Plugin Name: Test contact us plugin
 * Description: this is a contact form plugin developped as at of my wordpress learning experience.
 * Version: 1.0
 * Author: Agra Abdrrahim
 */

function html_form_code() {
    ?>
   <form action=" <?= esc_url( $_SERVER['REQUEST_URI'] )?> " method="post">
    <p>
    Your Name (required) <br />
    <input type="text" name="agra-name" pattern="[a-zA-Z0-9 ]+" value=" <?= isset( $_POST["agra-name"] ) ? esc_attr( $_POST["agra-name"] ) : '' ?>" size="40" />
    </p>
    <p>
    Your Email (required) <br />
    <input type="email" name="agra-email" value="<?= isset( $_POST["agra-email"] ) ? esc_attr( $_POST["agra-email"] ) : ''?>" size="40" />
    </p>
    <p>Subject (required) <br />
        <input type="text" name="agra-subject" pattern="[a-zA-Z ]+" value="<?= isset( $_POST["agra-subject"] ) ? esc_attr( $_POST["agra-subject"] ) : '' ?> " size="40" />
    </p>
    <p>
    Your Message (required) <br />
    <textarea rows="10" cols="35" name="agra-message"><?= isset( $_POST["agra-message"] ) ? esc_attr( $_POST["agra-message"] ) : '' ?> </textarea>
    </p>
    <p><input type="submit" name="agra-submitted" value="Send"/></p>
    </form>
    <?php
}

function proccess_email() {

    // if the submit button is clicked, send the email
    if ( isset( $_POST['agra-submitted'] ) ) {
        // sanitize form values
        $name    =  $_POST["agra-name"] ;
        $email   =$_POST["agra-email"] ;
        $subject = $_POST["agra-subject"] ;
        $message = $_POST["agra-message"] ;
        // get the blog administrator's email address
        saveDataToTable($email,$name,$message,$subject);?>
        <div class="alert alert-success" >
            message sent to admins!
        </div>
<?php
    }
}
function agra_shortcode() {
    ob_start();
    proccess_email();
    html_form_code();

    return ob_get_clean();
}
function createTable(){
    global $wpdb;
    $wpdb->query("CREATE TABLE IF NOT EXISTS `wp_contact_plugin_test` ( `id` INT NOT NULL AUTO_INCREMENT , `email` TEXT NOT NULL , `name` TEXT NOT NULL , `subject` TEXT NOT NULL , `message` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
}
function deleteTable(){
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS `wp_contact_plugin_test`;");
}
function saveDataToTable($email,$name,$message,$subject){
    global $wpdb;
    $wpdb->query("INSERT INTO `wp_contact_plugin_test` (`id`, `email`, `name`, `subject`, `message`) VALUES (NULL, '{$email}', '{$name}', '{$subject}', '{$subject}');");
}
add_shortcode( 'agra_contact_form', 'agra_shortcode' );
add_action('activate_contact-us-test/main.php',function(){
    createTable();
});

add_action('deactivate_contact-us-test/main.php',function(){
    deleteTable();
});

add_action('admin_menu', 'contact_form_add_menu_fun');
function contact_form_add_menu_fun() {

    add_menu_page(
        'Agra contact messages list',
        'Agra contact form',
        'edit_posts',
        'agra_contact_form',
        'list_received_emails'
        ,
        'dashicons-media-spreadsheet'

    );
}
function list_received_emails(){
    global $wpdb;
    $results=$wpdb->get_results("SELECT * FROM `wp_contact_plugin_test` ;");
    ?>


    <h5 class="mb-3">Agra Contact emails:</h5>
        <table class="table">
            <?php if(count($results)<1){?>
                <div class="alert alert-danger">
                    you do not have any incoming messages yet!
                </div>
            <?php }else{?>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Message</th>
            </tr>
            <?php }  foreach($results as $message){?>
            <tr>
                <td><?= $message->id ?></td>
                <td><?= $message->email?></td>
                <td><?= $message->name ?></td>
                <td><?= $message->subject ?></td>
                <td><?= $message->message ?></td>
            </tr>
            <?php }?>

        </table>
    <?php
}