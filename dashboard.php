<?php
require_once 'db.php';

if (!isset($_SESSION['tenant_id'])) {
    header('Location: index.php');
    exit;
}

$stmt = $db->prepare("SELECT full_name, rent FROM tenants WHERE id = ?");
$stmt->execute([$_SESSION['tenant_id']]);
$tenant = $stmt->fetch(PDO::FETCH_ASSOC);

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $details = $_POST['details'];
    if (!empty($details)) {
        // Fixed query with proper syntax and placeholders
        $stmt = $db->prepare("INSERT INTO maintenance_requests (tenant_id, request_details) VALUES (?, ?)");
        $stmt->execute([$_SESSION['tenant_id'], $details]);
        $message = 'Request submitted.';
    } else {
        $message = 'Please enter details.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome, <?php echo $tenant['full_name']; ?>!</h1>
    <p>Your Rent: $<?php echo number_format($tenant['rent'], 2); ?></p>

    <h2>Maintenance Request</h2>
    <form method="POST">
        <textarea name="details" placeholder="What needs fixing?" required></textarea><br>
        <button type="submit">Submit</button> <!-- Fixed typo: "tytpe" to "type" -->
    </form>
    <p><?php echo $message; ?></p>

    <p><a href="logout.php">Logout</a></p>
</body>
</html>