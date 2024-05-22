  <div class="stats shadow bg-base-300">
      <?php
        // Include database connection
        include "../../../php/db_connect.php";

        // Function to get the count of rows in a table
        function getTableRowCount($conn, $table)
        {
            $sql = "SELECT COUNT(*) AS count FROM $table";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row['count'];
            } else {
                return 0;
            }
        }

        // Get counts for each table
        $user_count = getTableRowCount($conn, 'users');
        $student_count = getTableRowCount($conn, 'student_accounts');
        $teacher_count = getTableRowCount($conn, 'teacher_accounts');
        $subject_count = getTableRowCount($conn, 'subject');
        $strand_count = getTableRowCount($conn, 'strand');
        $announcement_count = getTableRowCount($conn, 'announcement');

        // Close the database connection
        $conn->close();
        ?>

      <div class="stat place-items-center">
          <div class="stat-title font-semibold">Users</div>
          <div class="stat-value text-blue-500"><?php echo $user_count; ?></div>
          <div class="stat-desc">Current number of users.</div>
      </div>

      <div class="stat place-items-center">
          <div class="stat-title font-semibold">Students</div>
          <div class="stat-value text-blue-500"><?php echo $student_count; ?></div>
          <div class="stat-desc">Current number of students.</div>
      </div>

      <div class="stat place-items-center">
          <div class="stat-title font-semibold">Teachers</div>
          <div class="stat-value text-blue-500"><?php echo $teacher_count; ?></div>
          <div class="stat-desc">Current count of teachers.</div>
      </div>

      <div class="stat place-items-center">
          <div class="stat-title font-semibold">Subjects</div>
          <div class="stat-value text-blue-500"><?php echo $subject_count; ?></div>
          <div class="stat-desc">Current count of subjects.</div>
      </div>

      <div class="stat place-items-center">
          <div class="stat-title font-semibold">Courses</div>
          <div class="stat-value text-blue-500"><?php echo $strand_count; ?></div>
          <div class="stat-desc">Current count of courses.</div>
      </div>

      <div class="stat place-items-center">
          <div class="stat-title font-semibold">Announcements</div>
          <div class="stat-value text-blue-500"><?php echo $announcement_count; ?></div>
          <div class="stat-desc">Current count of announcements.</div>
      </div>

  </div>