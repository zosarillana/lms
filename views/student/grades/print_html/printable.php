<?php
session_start();
include '../../../../php/db_connect.php';
include '../../../../php/student_grade/fetch_grade_print.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Student Grades</title>
  <style>
    .container {
      display: flex;
      align-items: center;
    }

    .header-content {
      display: flex;
      align-items: center;
    }

    .header-content h1,
    .header-content h2 {
      margin: 0;
    }

    .header-content img {
      width: 100px;
      margin-right: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #e0e0e0;
    }

    .filter-buttons {
      margin-bottom: 20px;
    }

    .filter-buttons button {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
      margin-right: 10px;
    }

    .print-button {
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }

    @media print {

      .filter-buttons,
      .print-button {
        display: none;
      }
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="header-content">
      <img src="../../../../images/logo-nobg.png" alt="Example Image">
      <div>
        <h1>Student Grade Record</h1>
        <h2>Student Full Name: <?php echo $_SESSION['user_fullname']; ?></h2>
      </div>
    </div>
  </div>

  <div class="filter-buttons">
    <button onclick="filterSemester('1st Semester')">1st Semester</button>
    <button onclick="filterSemester('2nd Semester')">2nd Semester</button>
    <button onclick="filterSemester('')">All</button>
    <button class="print-button" onclick="printPage()">Print</button>
  </div>



  <table>
    <thead>
      <tr>
        <th>Fullname</th>
        <th>Subject</th>
        <th>Semester</th>
        <th>1st Quarter</th>
        <th>2nd Quarter</th>
        <th>Final</th>
        <th>Date Created</th>
      </tr>
    </thead>
    <tbody id="gradesTable">
      <?php
      $student_id = $_SESSION['user_id'];
      if (!empty($studentGrades)) :
        foreach ($studentGrades as $studentGrade) :
          if ($studentGrade['student_id'] == $student_id) :
      ?>
            <tr data-semester="<?php echo $studentGrade['semester']; ?>">
              <td><?php echo $studentGrade['student_fname'] . " " . $studentGrade['student_lname'] ?></td>
              <td><?php echo $studentGrade['subject_name']; ?></td>
              <td><?php echo $studentGrade['semester']; ?></td>
              <td><?php echo $studentGrade['1st_quarter']; ?></td>
              <td><?php echo $studentGrade['2nd_quarter']; ?></td>
              <td><?php echo $studentGrade['final']; ?></td>
              <td><?php echo $studentGrade['date_created']; ?></td>
            </tr>
        <?php
          endif;
        endforeach;
      else :
        ?>
        <tr>
          <td colspan="7" class="text-center">No grades found</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <script>
    function filterSemester(semester) {
      var rows = document.querySelectorAll('#gradesTable tr');
      rows.forEach(function(row) {
        if (semester === '' || row.getAttribute('data-semester') === semester) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    }

    function printPage() {
      window.print();
    }
  </script>
</body>

</html>