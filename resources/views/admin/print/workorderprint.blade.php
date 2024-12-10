<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Order</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .table-header {
            text-align: center;
            font-weight: bold;
        }
        .header-section img {
            width: 60px;
        }
        .remarks-box {
            height: 100px;
            width: 50px
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Header -->
        <div class="d-flex align-items-center mb-2">
            <img src="{{ asset('img1/universitylogo.jpg') }}" alt="Logo" class="me-3" style="width: 60px; height: auto;">
            <div class="text-center flex-grow-1">
                <h5>ශ්‍රී ලාංකා අග්නිදිය විශ්වවිද්‍යාලය</h5>
                <h5>தென்கிழக்கு பல்கலைக்கழகம்</h5>
                <h4>SOUTH EASTERN UNIVERSITY OF SRI LANKA</h4>
            </div>
        </div>
        <div class="d-flex align-items-center mb-4">
            <div class="text-center flex-grow-1">
                <hr>
                <h5 class="text-uppercase fw-bold">Works Order</h5>
                <h6>Requisition of Maintenance/ Repair and Improvement Works</h6>
            </div>
        </div>

        <!-- Table -->
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="fw-bold">Date</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="fw-bold">Works Order No</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="fw-bold">Department</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="fw-bold">Work Type</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="fw-bold">Work to be performed/ Complain</td>
                    <td class="remarks-box"></td>
                </tr>
                <tr>
                    <td class="fw-bold">Requested By</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="fw-bold">Approved By</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="fw-bold">Forwarded To</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="fw-bold">Status</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="fw-bold">Completion Date</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="fw-bold">Remarks</td>
                    <td class="remarks-box"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
