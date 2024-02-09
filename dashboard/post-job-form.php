<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Job Posting Form</title>
</head>
<body >

<div style="padding-left:7%" class="container mt-5">
    <h2 class="mb-4">Post a Job</h2>
    <form>
        <!-- Job Title -->
        <div class="form-group">
            <label for="jobTitle">Job Title:</label>
            <input type="text" class="form-control" id="jobTitle" name="jobTitle" required>
        </div>

        <!-- Location -->
        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>

        

        <!-- Job Type -->
        <div class="form-group">
            <label for="jobType">Job Type:</label>
            <select class="form-control" id="jobType" name="jobType" required>
                <option value="fullTime">Full Time</option>
                <option value="partTime">Part Time</option>
                <option value="contract">Contract</option>
            </select>
        </div>

        <!-- Job Description -->
        <div class="form-group">
            <label for="jobDescription">Job Description:</label>
            <textarea class="form-control" id="jobDescription" name="jobDescription" rows="4" required></textarea>
        </div>

        <!-- Responsibilities -->
        <div class="form-group">
            <label for="responsibilities">Responsibilities:</label>
            <textarea class="form-control" id="responsibilities" name="responsibilities" rows="4" required></textarea>
        </div>

        <!-- Education + Experience -->
        <div class="form-group">
            <label for="eduExperience">Education + Experience:</label>
            <textarea class="form-control" id="eduExperience" name="eduExperience" rows="4" required></textarea>
        </div>

        <!-- Other Benefits -->
        <div class="form-group">
            <label for="otherBenefits">Other Benefits:</label>
            <textarea class="form-control" id="otherBenefits" name="otherBenefits" rows="4" required></textarea>
        </div>

        <!-- Published On -->
        <div class="form-group">
            <label for="publishedOn">Published On:</label>
            <input type="date" class="form-control" id="publishedOn" name="publishedOn" required>
        </div>

        <!-- Vacancy -->
        <div class="form-group">
            <label for="vacancy">Vacancy:</label>
            <input type="number" class="form-control" id="vacancy" name="vacancy" required>
        </div>

        <!-- Required Experience in Years -->
        <div class="form-group">
            <label for="experience">Required Experience (in years):</label>
            <input type="number" class="form-control" id="experience" name="experience" required>
        </div>

        <!-- Gender -->
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="any">Any</option>
            </select>
        </div>

        <!-- Job Region -->
        <div class="form-group">
            <label for="jobRegion">Salary:</label>
            <input type="text" class="form-control" id="jobSalary" name="Salary" required>
        </div>

        <!-- Application Deadline -->
        <div class="form-group">
            <label for="deadline">Application Deadline:</label>
            <input type="date" class="form-control" id="deadline" name="deadline" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
