<?php
// Database credentials (REPLACE WITH YOUR ACTUAL CREDENTIALS)
$host = "localhost";
$username = "root";
$dbname = "ClubDatabase_copy";
$password = "Lennox2000";

// Image directory path (relative to script)
$imageDir = "scheduleMEDIA/";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Event data (this would ideally come from your JavaScript array, but for this example, it's hardcoded)
$events = [
    [
        "event_title" => "Entrepreneurship Workshop: Idea Validation",
        "event_date" => "2024-03-15",
        "event_time" => "18:00:00",
        "event_type" => "workshop",
        "event_desc" => "Learn how to validate your business ideas.",
        "event_detailed_desc" => "This workshop will cover various methods for validating your business idea, including market research, customer interviews, and competitor analysis. Guest speaker: Sarah Chen, Founder of InnovateTech."
    ],
    [
        "event_title" => "Marketing Strategies for Small Businesses",
        "event_date" => "2023-06-25",
        "event_time" => "14:00:00",
        "event_type" => "financial",
        "event_desc" => "Discover effective marketing techniques for your small business.",
        "event_detailed_desc" => "This seminar will cover social media marketing, email marketing, and content marketing.",
        "event_img" => $imageDir . "image2.jpg" 
    ],
    [
        "event_title" => "Networking Event: Meet Local Entrepreneurs",
        "event_date" => "2023-11-20",
        "event_time" => "19:00:00",
        "event_type" => "networking",
        "event_desc" => "Network with successful local entrepreneurs.",
        "event_detailed_desc" => "Meet and connect with experienced entrepreneurs in the community. Great opportunity to learn and build connections."
    ],
    [
        "event_title" => "Financial Planning for Entrepreneurs",
        "event_date" => "2023-06-18",
        "event_time" => "10:00:00",
        "event_type" => "financial",
        "event_desc" => "Learn how to manage your finances as an entrepreneur.",
        "event_detailed_desc" => "This workshop will cover budgeting, forecasting, and securing funding.",
        "event_img" => $imageDir . "image1.jpg" 
    ],
    [
        "event_title" => "Business Plan Competition",
        "event_date" => "2025-05-10",
        "event_time" => "14:00:00",
        "event_type" => "competition",
        "event_desc" => "Pitch your business plan and win prizes!",
        "event_detailed_desc" => "Students will present their business plans to a panel of judges. Prizes will be awarded to the top three entries."
    ],
    [
        "event_title" => "Workshop: Building a Minimum Viable Product (MVP)",
        "event_date" => "2026-09-12",
        "event_time" => "10:00:00",
        "event_type" => "workshop",
        "event_desc" => "Learn how to build a Minimum Viable Product.",
        "event_detailed_desc" => "This workshop will cover the process of developing a basic version of your product to test market viability."
    ],
    [
        "event_title" => "Guest Speaker: Funding Your Startup",
        "event_date" => "2024-07-25",
        "event_time" => "13:30:00",
        "event_type" => "speaker",
        "event_desc" => "Learn about different funding options for startups.",
        "event_detailed_desc" => "A successful entrepreneur will share their experiences and advice on securing funding for a new venture."
    ],
    [
        "event_title" => "Financial Literacy Workshop for Entrepreneurs",
        "event_date" => "2023-04-05",
        "event_time" => "16:00:00",
        "event_type" => "financial",
        "event_desc" => "Improve your financial literacy as an entrepreneur.",
        "event_detailed_desc" => "This workshop will cover budgeting, financial statements, and securing funding."
    ],
    [
        "event_title" => "Networking Event: Alumni Entrepreneurs",
        "event_date" => "2027-02-18",
        "event_time" => "19:00:00",
        "event_type" => "networking",
        "event_desc" => "Connect with successful alumni entrepreneurs.",
        "event_detailed_desc" => "An evening of networking with alumni who have started their own businesses."
    ],
    [
        "event_title" => "Workshop: Marketing Your Startup on a Budget",
        "event_date" => "2025-11-01",
        "event_time" => "14:00:00",
        "event_type" => "workshop",
        "event_desc" => "Learn effective marketing strategies for startups.",
        "event_detailed_desc" => "This workshop will focus on low-cost and high-impact marketing techniques."
    ],
    [
        "event_title" => "Pitch Competition: The Big Idea",
        "event_date" => "2026-05-22",
        "event_time" => "09:00:00",
        "event_type" => "competition",
        "event_desc" => "Pitch your best business idea and win!",
        "event_detailed_desc" => "Students will compete for prizes by pitching their most innovative business ideas."
    ],
    [
        "event_title" => "Guest Speaker: Building a Strong Team",
        "event_date" => "2024-10-10",
        "event_time" => "13:00:00",
        "event_type" => "speaker",
        "event_desc" => "Learn how to build a high-performing team.",
        "event_detailed_desc" => "An experienced entrepreneur will share their insights on building and managing a successful team."
    ],
    [
        "event_title" => "Workshop: Legal Aspects of Starting a Business",
        "event_date" => "2027-08-29",
        "event_time" => "10:30:00",
        "event_type" => "workshop",
        "event_desc" => "Learn about the legal requirements for starting a business.",
        "event_detailed_desc" => "This workshop will cover legal structures, contracts, and intellectual property."
    ],
    [
        "event_title" => "Startup Showcase",
        "event_date" => "2025-07-08",
        "event_time" => "14:00:00",
        "event_type" => "networking",
        "event_desc" => "Showcase your startup to potential investors and mentors.",
        "event_detailed_desc" => "An opportunity for students to present their startups to a wider audience."
    ],
    [
        "event_title" => "Networking Event: Venture Capitalists",
        "event_date" => "2026-01-15",
        "event_time" => "18:00:00",
        "event_type" => "networking",
        "event_desc" => "Network with venture capitalists and angel investors.",
        "event_detailed_desc" => "A valuable opportunity to connect with potential investors for your startup."
    ],
    [
        "event_title" => "Workshop: Negotiating Deals",
        "event_date" => "2024-12-05",
        "event_time" => "13:30:00",
        "event_type" => "workshop",
        "event_desc" => "Learn essential negotiation skills for entrepreneurs.",
        "event_detailed_desc" => "This workshop will cover strategies and techniques for successful negotiations."
    ],
    [
        "event_title" => "Financial Planning for Entrepreneurs",
        "event_date" => "2023-06-18",
        "event_time" => "10:00:00",
        "event_type" => "financial",
        "event_desc" => "Learn how to manage your finances as an entrepreneur.",
        "event_detailed_desc" => "This workshop will cover budgeting, forecasting, and securing funding."
    ]
];

// Prepare the SQL statement ONCE outside the loop (more efficient)
// Prepare the SQL statement ONCE outside the loop
$sql = "INSERT INTO events (event_title, event_date, event_time, event_type, event_desc, event_detailed_desc, event_img) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

foreach ($events as $event) {
    // Bind parameters (important: inside the loop!)
    $stmt->bind_param("sssssss", $event_title, $event_date, $event_time, $event_type, $event_desc, $event_detailed_desc, $event_img);

    $event_title = $event["event_title"];
    $event_date = $event["event_date"];
    $event_time = $event["event_time"];
    $event_type = $event["event_type"];
    $event_desc = $event["event_desc"];
    $event_detailed_desc = $event["event_detailed_desc"];
    $event_img = $event["event_img"] ?? NULL; // Handle missing image paths gracefully

    if ($stmt->execute() === false) {
        echo "Execute failed for event '" . $event_title . "': (" . $stmt->errno . ") " . $stmt->error . "\n";
        // Consider more robust error handling (e.g., logging, retrying)
    } else {
        echo "Event '" . $event_title . "' inserted successfully.\n";
    }
}

// Close the statement and connection (important: after the loop!)
$stmt->close();
$conn->close();

echo "All records processed. (See above for any errors.)\n";

?>
