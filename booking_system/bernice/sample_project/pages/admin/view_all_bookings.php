<?php
require_once "../../config/config.php";
require_once "../../includes/admin_guard.php";

$result = $conn->query("
    SELECT booking_id, user_id, facility_id,
           booking_date, start_time, end_time, status
    FROM bookings
    ORDER BY booking_date ASC, start_time ASC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - All Bookings</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>

<div class="admin-page-header">
    <h1>All Facility Bookings</h1>
    <p class="admin-subtitle">
        Admin View: All bookings are validated before approval.
    </p>
</div>

<table>
    <tr>
        <th>User ID</th>
        <th>Facility ID</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['user_id'] ?></td>
                <td><?= $row['facility_id'] ?></td>
                <td><?= $row['booking_date'] ?></td>
                <td>
                    <?= substr($row['start_time'], 0, 5) ?>
                    -
                    <?= substr($row['end_time'], 0, 5) ?>
                </td>
                <td>
                    <span class="status-badge status-<?= $row['status'] ?>">
                        <?= ucfirst($row['status']) ?>
                    </span>
                </td>
                <td class="admin-actions">
                    <?php if ($row['status'] === 'pending'): ?>
                        <a href="approve_booking.php?id=<?= $row['booking_id'] ?>"
                           class="btn btn-primary">
                            Approve
                        </a>
                        <a href="reject_booking.php?id=<?= $row['booking_id'] ?>"
                           class="btn btn-danger"
                           onclick="return confirm('Reject this booking?')">
                            Reject
                        </a>
                    <?php else: ?>
                        <span class="no-action">—</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="6">No bookings found.</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
