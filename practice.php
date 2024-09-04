<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'enrollment_system';

// Connect to the database
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to enroll in a course
function enrollInCourse($student_id, $course_id) {
    $query = "INSERT INTO enrollments (student_id, course_id) VALUES ('$student_id', '$course_id')";
    mysqli_query($conn, $query);
}

// Function to drop a course
function dropCourse($student_id, $course_id) {
    $query = "DELETE FROM enrollments WHERE student_id = '$student_id' AND course_id = '$course_id'";
    mysqli_query($conn, $query);
}

// Function to view enrolled courses
function viewEnrolledCourses($student_id) {
    $query = "SELECT c.course_name FROM enrollments e JOIN courses c ON e.course_id = c.id WHERE e.student_id = '$student_id'";
    $result = mysqli_query($conn, $query);
    $enrolled_courses = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $enrolled_courses[] = $row['course_name'];
    }
    return $enrolled_courses;
}

// Function to check course availability
function checkCourseAvailability($course_id) {
    $query = "SELECT capacity FROM courses WHERE id = '$course_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $capacity = $row['capacity'];
    $query = "SELECT COUNT(*) as enrolled_students FROM enrollments WHERE course_id = '$course_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $enrolled_students = $row['enrolled_students'];
    $available_seats = $capacity - $enrolled_students;
    return $available_seats;
}

// Example usage
$student_id = 1; // Replace with the actual student ID
$course_id = 1; // Replace with the actual course ID

// Enroll in a course
enrollInCourse($student_id, $course_id);

// Drop a course
dropCourse($student_id, $course_id);

// View enrolled courses
$enrolled_courses = viewEnrolledCourses($student_id);
echo "Enrolled courses: " . implode(", ", $enrolled_courses) . "<br>";

// Check course availability
$available_seats = checkCourseAvailability($course_id);
echo "Available seats in course $course_id: $available_seats<br>";

?>