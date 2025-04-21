<?php

namespace Core;

class UpdatingService
{
    public function attempt($changedfields, $email)
    {
        if (array_key_exists('email', $changedfields)) {  //check if the channged email isn't used in the website
            if (!$this->emailExist($changedfields['email'])) {
                $this->updateProfile($changedfields, $email);
                session::changeEmail($changedfields['email']);
                return true;
            }
            return false;
        }
        // If no email change, just update
        $this->updateProfile($changedfields, $email);
        return true;
    }


    public function emailExist($email)
    {
        $user = App::resolve(Database::class)
            ->query('select * from users where email = :email', [
                'email' => $email
            ])->find();

        return $user ? true : false;
    }


    public function updateProfile($changedfields, $email)
    {

        // Initialize an array to store the SET clause and parameters
        $setClause = [];
        $params = [];

        // Iterate over the changed fields and prepare the SET clause and parameters
        foreach ($changedfields as $key => $value) {
            switch ($key) {
                case 'firstname':
                case 'lastname':
                case 'email':
                case 'phone':
                case 'birthdate':

                    // For these fields, we just add them as they are
                    $setClause[] = "$key = :$key";
                    $params[$key] = $value;
                    break;

                case 'avatar':
                    // For these fields, we just add them as they are
                    $fileName = $_FILES['avatar']['name']; // Extracts the original file name
                    $folder = base_path('/public/img/avatars/') . $fileName; // Set the destination path with file name

                    $tempPath = $_FILES['avatar']['tmp_name']; // Get the temporary path
                    //dd("File uploaded successfully!");
                    // Move the uploaded file from the temporary location to the final folder
                    move_uploaded_file($tempPath, $folder);
                     

                    $setClause[] = "$key = :$key";
                    $params[$key] = $fileName;




                    break;

                case 'password':
                    // If the password is changed, hash it before saving
                    $setClause[] = "$key = :$key";
                    $params[$key] = password_hash($value, PASSWORD_BCRYPT);
                    break;

                default:
                    // Skip fields that are not in the allowed list
                    break;
            }
        }

        // If no fields to update, exit the function
        if (empty($setClause)) {
            return;
        }

        // Join the SET clause parts into a single string
        $setClauseString = implode(', ', $setClause);



        $query = "UPDATE users SET $setClauseString WHERE email = :original_email";
        $params['original_email'] = $email;

        App::resolve(Database::class)->query($query, $params);
    }
}
