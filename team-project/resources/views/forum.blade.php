<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/forum.css') }}" rel="stylesheet">
    <title>Discussion Board</title>
</head>
<body>
    <h1>Discussion Board</h1>

    <div class="create-thread-btn">
        <a onclick="toggleForm()">Create Thread</a>
    </div>

    <div class="thread-form" id="threadForm">
        <form>
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>

            <button type="submit" onclick="submitForm()">Submit</button>
            <button type="button" class="cancel" onclick="cancelForm()">Cancel</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Thread</th>
                <th>Date</th>
                <th>Description</th>
                <th>Author</th>
                <th>Total Posts</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Discussion 1</td>
                <td>31/01/2024</td>
                <td>user1</td>
                <td>Sample Description 1</td>
                <td>22</td>
            </tr>
            <tr>
                <td>Discussion 2</td>
                <td>31/01/2024</td>
                <td>user2</td>
                <td>Sample Description 2</td>
                <td>10</td>
            </tr>
            
        </tbody>
    </table>
    <script>
        function toggleForm() {
            var form = document.getElementById('threadForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }

        function submitForm() {
            // Add logic to submit the form data
            // For now, just close the form
            toggleForm();
        }

        function cancelForm() {
        var subjectInput = document.getElementById('subject');
        var descriptionInput = document.getElementById('description');

        if (subjectInput.value.trim() !== '' || descriptionInput.value.trim() !== '') {
            var confirmDiscard = confirm("Are you sure you want to cancel new discussion?");
            if (!confirmDiscard) {
                return; // Do nothing if the user cancels the confirmation
            }
        }

        // Clear the input fields and close the form
        subjectInput.value = '';
        descriptionInput.value = '';
        toggleForm();
    }
    </script>
</body>
</html>
