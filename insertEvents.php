<?php
// Database credentials (REPLACE WITH YOUR ACTUAL CREDENTIALS)
$servername = "localhost";
$username = "root";
$password = "Lennox2000";
$dbname = "events_calendar";

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
        "title" => "Financial Planning for Entrepreneurs",
        "date" => "2023-06-18",
        "time" => "10:00:00",
        "eventType" => "financial",
        "description" => "Learn how to manage your finances as an entrepreneur.",
        "detailedDescription" => "This workshop will cover budgeting, forecasting, and securing funding.",
        "eventImage" => $imageDir . "image1.jpg" // Added image path
    ],
    [
        "title" => "Entrepreneurship Workshop: Idea Validation",
        "date" => "2024-03-15",
        "time" => "18:00:00",
        "eventType" => "workshop",
        "description" => "Learn how to validate your business ideas.",
        "detailedDescription" => "This workshop will cover various methods for validating your business idea, including market research, customer interviews, and competitor analysis. Guest speaker: Sarah Chen, Founder of InnovateTech."
    ],
    [
        "title" => "Marketing Strategies for Small Businesses",
        "date" => "2023-06-25",
        "time" => "14:00:00",
        "eventType" => "marketing",
        "description" => "Discover effective marketing techniques for your small business.",
        "detailedDescription" => "This seminar will cover social media marketing, email marketing, and content marketing.",
        "eventImage" => $imageDir . "image2.jpg" // Added image path
    ],
    [
        "title" => "Networking Event: Meet Local Entrepreneurs",
        "date" => "2023-11-20",
        "time" => "19:00:00",
        "eventType" => "networking",
        "description" => "Network with successful local entrepreneurs.",
        "detailedDescription" => "Meet and connect with experienced entrepreneurs in the community.  Great opportunity to learn and build connections."
    ],
    [
        "title" => "Business Plan Competition",
        "date" => "2025-05-10",
        "time" => "14:00:00",
        "eventType" => "competition",
        "description" => "Pitch your business plan and win prizes!",
        "detailedDescription" => "Students will present their business plans to a panel of judges.  Prizes will be awarded to the top three entries."
    ],
    [
        "title" => "Workshop: Building a Minimum Viable Product (MVP)",
        "date" => "2026-09-12",
        "time" => "10:00:00",
        "eventType" => "workshop",
        "description" => "Learn how to build a Minimum Viable Product.",
        "detailedDescription" => "This workshop will cover the process of developing a basic version of your product to test market viability."
    ],
    [
        "title" => "Guest Speaker:  Funding Your Startup",
        "date" => "2024-07-25",
        "time" => "13:30:00",
        "eventType" => "speaker",
        "description" => "Learn about different funding options for startups.",
        "detailedDescription" => "A successful entrepreneur will share their experiences and advice on securing funding for a new venture."
    ],
    [
        "title" => "Financial Literacy Workshop for Entrepreneurs",
        "date" => "2023-04-05",
        "time" => "16:00:00",
        "eventType" => "financial",
        "description" => "Improve your financial literacy as an entrepreneur.",
        "detailedDescription" => "This workshop will cover budgeting, financial statements, and securing funding."
    ],
    [
        "title" => "Networking Event: Alumni Entrepreneurs",
        "date" => "2027-02-18",
        "time" => "19:00:00",
        "eventType" => "networking",
        "description" => "Connect with successful alumni entrepreneurs.",
        "detailedDescription" => "An evening of networking with alumni who have started their own businesses."
    ],
    [
        "title" => "Workshop:  Marketing Your Startup on a Budget",
        "date" => "2025-11-01",
        "time" => "14:00:00",
        "eventType" => "workshop",
        "description" => "Learn effective marketing strategies for startups.",
        "detailedDescription" => "This workshop will focus on low-cost and high-impact marketing techniques."
    ],
    [
        "title" => "Pitch Competition:  The Big Idea",
        "date" => "2026-05-22",
        "time" => "09:00:00",
        "eventType" => "competition",
        "description" => "Pitch your best business idea and win!",
        "detailedDescription" => "Students will compete for prizes by pitching their most innovative business ideas."
    ],
    [
        "title" => "Guest Speaker:  Building a Strong Team",
        "date" => "2024-10-10",
        "time" => "13:00:00",
        "eventType" => "speaker",
        "description" => "Learn how to build a high-performing team.",
        "detailedDescription" => "An experienced entrepreneur will share their insights on building and managing a successful team."
    ],
    [
        "title" => "Workshop:  Legal Aspects of Starting a Business",
        "date" => "2027-08-29",
        "time" => "10:30:00",
        "eventType" => "workshop",
        "description" => "Learn about the legal requirements for starting a business.",
        "detailedDescription" => "This workshop will cover legal structures, contracts, and intellectual property."
    ],
    [
        "title" => "Startup Showcase",
        "date" => "2025-07-08",
        "time" => "14:00:00",
        "eventType" => "networking",
        "description" => "Showcase your startup to potential investors and mentors.",
        "detailedDescription" => "An opportunity for students to present their startups to a wider audience."
    ],
    [
        "title" => "Networking Event:  Venture Capitalists",
        "date" => "2026-01-15",
        "time" => "18:00:00",
        "eventType" => "networking",
        "description" => "Network with venture capitalists and angel investors.",
        "detailedDescription" => "A valuable opportunity to connect with potential investors for your startup."
    ],
    [
        "title" => "Workshop:  Negotiating Deals",
        "date" => "2024-12-05",
        "time" => "13:30:00",
        "eventType" => "workshop",
        "description" => "Learn essential negotiation skills for entrepreneurs.",
        "detailedDescription" => "This workshop will cover strategies and techniques for successful negotiations."
    ],
    [
        "title" => "Financial Planning for Entrepreneurs",
        "date" => "2023-06-18",
        "time" => "10:00:00",
        "eventType" => "financial",
        "description" => "Learn how to manage your finances as an entrepreneur.",
        "detailedDescription" => "This workshop will cover budgeting, forecasting, and securing funding."
    ]
];

// Prepare the SQL statement ONCE outside the loop (more efficient)
$sql = "INSERT INTO events (title, date, time, eventType, description, detailedDescription, eventImage) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}

$stmt->bind_param("sssssss", $title, $date, $time, $eventType, $description, $detailedDescription, $imageBlob); // Changed to $imageBlob


foreach ($events as $event) {
    $title = $event["title"];
    $date = $event["date"];
    $time = $event["time"];
    $eventType = $event["eventType"];
    $description = $event["description"];
    $detailedDescription = $event["detailedDescription"];
    $imagePath = $event["eventImage"] ?? null;

    $imageBlob = null; // Initialize imageBlob

    if ($imagePath !== null) {
        if (file_exists($imagePath)) {
            $imageBlob = file_get_contents($imagePath);
            if ($imageBlob === false) {
                echo "Error reading image file: " . $imagePath . " for event '" . $title . "'. Skipping image.\n";
            }
        } else {
            echo "Warning: Image file not found: " . $imagePath . " for event '" . $title . "'. Skipping image.\n";
        }
    }


    if ($stmt->execute() === false) {
        echo "Execute failed for event '" . $title . "': (" . $stmt->errno . ") " . $stmt->error . "\n";
    }
}

$stmt->close(); // Close the statement after the loop
echo "New records created successfully (or errors reported above)\n";
$conn->close();

?>
