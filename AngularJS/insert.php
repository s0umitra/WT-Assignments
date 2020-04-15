<?php
include('dbconnect.php');

$error = array();
$form_data = json_decode(file_get_contents("php://input"));

$id=$gender=$message=$validation_error=$username=$password=$firstname=$lastname=$email=$mobile=$class=$department=$books_issued=$issue_date='';


if($form_data->action == 'fetch_single_data')
{
	$query = "SELECT * FROM lib_userJS WHERE id='".$form_data->id."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['id'] = $row['id'];
        $output['username'] = $row['username'];
        $output['password'] = $row['password'];
		$output['firstname'] = $row['firstname'];
		$output['lastname'] = $row['lastname'];
		$output['gender'] = $row['gender'];
		$output['email'] = $row['email'];
		$output['mobile'] = $row['mobile'];
		$output['class'] = $row['class'];
		$output['department'] = $row['department'];
		$output['books_issued'] = $row['books_issued'];
		$output['issue_date'] = $row['issue_date'];
	}
}
elseif($form_data->action == "Delete")
{
	$query = "DELETE FROM lib_userJS WHERE id='".$form_data->id."'";
	$statement = $connect->prepare($query);
	if($statement->execute())
	{
		$output['message'] = 'Entry Deleted!!';
	}
}
else
{
	if(empty($form_data->id))
	{
		$error[] = 'ID is Required';
	}
	else
	{
		$id = $form_data->id;
	}
	if(empty($form_data->username))
    {
        $error[] = 'Username is Required';
    }
    else
    {
        $username = $form_data->username;
    }
    if(empty($form_data->password))
    {
        $error[] = 'Password is Required';
    }
    else
    {
        $password = $form_data->password;
    }
	if(empty($form_data->firstname))
	{
		$error[] = 'First Name is Required';
	}
	else
	{
		$firstname = $form_data->firstname;
	}
	if(empty($form_data->lastname))
	{
		$error[] = 'Last Name is Required';
	}
	else
	{
		$lastname = $form_data->lastname;
	}
	if(empty($form_data->gender))
	{
		$error[] = 'Gender is Required';
	}
	else
	{
		$gender = $form_data->gender;
	}
	if(empty($form_data->email))
	{
		$error[] = 'Email ID is Required';
	}
	else
	{
		$email = $form_data->email;
	}
	if(empty($form_data->mobile))
	{
		$error[] = 'Mobile Number is Required';
	}
	else
	{
		$mobile = $form_data->mobile;
	}
    if(empty($form_data->class))
	{
		$error[] = 'Class Name is Required';
	}
	else
	{
		$class = $form_data->class;
	}
	if(empty($form_data->department))
	{
		$error[] = 'Department is Required';
	}
	else
	{
		$department = $form_data->department;
	}
	if(empty($form_data->books_issued))
	{
		$error[] = 'Number of Books Issued is Required';
	}
	else
	{
		$books_issued = $form_data->books_issued;
	}
	if(empty($form_data->issue_date))
	{
		$error[] = 'Issue Date are Required';
	}
	else
	{
		$issue_date = $form_data->issue_date;
	}

	if(empty($error))
	{
		if($form_data->action == 'Insert')
		{

			$data = array(
				':id'			=> 	$id,
				':username'		=>	$username,
				':password'		=>	$password,
				':firstname'	=>	$firstname,
				':lastname'		=>	$lastname,
				':gender'		=>	$gender,
				':email'		=>	$email,
				':mobile'		=>	$mobile,
				':class'		=>	$class,
				':department'	=>	$department,
				':books_issued'	=>	$books_issued,
				':issue_date'	=>	$issue_date,
			);
			$query = "
				INSERT INTO lib_userJS 
					VALUES 
					(:id,:username,:password, :firstname, :lastname, :gender, :email, :mobile, :class, :department, :books_issued, :issue_date)
			";
			$statement = $connect->prepare($query);
			if($statement->execute($data))
			{
				$message = 'Data Inserted';
			}
		}
		if($form_data->action == 'Edit')
		{
			$data = array(
				':username'		=>	$username,
				':password'		=>	$password,
				':firstname'	=>	$firstname,
				':lastname'		=>	$lastname,
				':gender'		=>	$gender,
				':email'		=>	$email,
				':mobile'		=>	$mobile,
				':class'		=>	$class,
				':department'	=>	$department,
				':books_issued'	=>	$books_issued,
				':issue_date'	=>	$issue_date,
				':id'			=>	$form_data->id
			);
			$query = "
			UPDATE lib_userJS 
			SET username = :username, password = :password, firstname = :firstname, lastname = :lastname, gender = :gender, email = :email, mobile = :mobile, class= :class, department = :department, books_issued = :books_issued, issue_date = :issue_date
			WHERE id = :id
			";

			$statement = $connect->prepare($query);
			if($statement->execute($data))
			{
				$message = 'Data Edited';
			}
		}
	}
	else
	{
		$validation_error = implode(", ", $error);
	}

	$output = array(
		'error'		=>	$validation_error,
		'message'	=>	$message
	);

}
echo json_encode($output);
?>
