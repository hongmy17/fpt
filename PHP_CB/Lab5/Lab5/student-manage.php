<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 10px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <h1>Student Management</h1>

  <?php 
    $students = [];

    function addStudent(&$students, $id, $name, $grades) {
      $students[] = ["id" => $id,"name"=> $name,"grades"=> $grades];
    }

    function removeStudentByID(&$students, $id) {
      foreach ($students as $key => $student) {
        if ($student["id"] == $id) {
          unset($students[$key]);
          break;
        }
      }

      $students = array_values($students);
    }

    function findStudentByName($students, $name) {
      foreach ($students as $student) {
        if ($student["name"] == $name) {
          return $student;
        }
      }

      return null;
    }

    function calculateAverageGrade($grades) {
      return count($grades) ? array_sum($grades) / count($grades) :0;
    }

    function getStudentsByAverageGrade($students, $minAverageGrade) {
      $result = [];

      foreach ($students as $student) {
        $average = calculateAverageGrade($student["grades"]);
        if ($average > $minAverageGrade) {
          $result[] = $student;
        }
      }

      return $result;
    }

    function displayStudents($students) {
      echo "<table>";
      echo "<tr>
              <th>ID</th>
              <th>Name</th>
              <th>Grades</th>
              <th>Average Grade</th>
            </tr>";

      foreach ($students as $student) {
        $averageGrade = calculateAverageGrade($student["grades"]);
        echo "<tr>";
          printf("<td>%d</td>", $student["id"]);
          printf("<td>%s</td>", $student["name"]);
          printf("<td>%s</td>", implode(", ", $student["grades"]));
          printf("<td>%f</td>", number_format($averageGrade,2));
        echo "</tr>";
      }
      echo "</table>";
    }

    addStudent($students,1,"Student 1",[7, 8, 9]);
    addStudent($students,2,"Student 2",[7, 9, 9]);
    addStudent($students,3,"Student 3",[6, 9, 10]);

    echo "<h2>All Students</h2>";
    displayStudents($students);

    removeStudentByID($students,1);
    echo "<h2>After remove student with ID 1</h2>";
    displayStudents($students);

    $student = findStudentByName($students,"Student 3");
    echo "<h2>Found student with name 'Student 3'</h2>";
    if ($student) {
      echo "ID: {$student['id']}, name: {$student['name']}, grades: " . implode(", ", $student["grades"]);
    } else {
      echo "Student not found";
    }

    $topStudents = getStudentsByAverageGrade($students, 6.5 );
    echo "<h2>Student with average grade greater than 6.5</h2>";
    displayStudents($topStudents);
  ?>
</body>
</html>