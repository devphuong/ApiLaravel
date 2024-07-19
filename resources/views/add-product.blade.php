<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>Thêm Sản Phẩm</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRbPCo1MfTswjY2VpK0ZDJgESdGoaHLoef1g&s" type="image/png">

    <!-- Template -->
    <link rel="stylesheet" href="{{ asset('graindashboard/css/graindashboard.css') }}">
</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    <!-- Header -->
    <header class="header bg-body">
        <nav class="navbar flex-nowrap p-0">
            <div class="navbar-brand-wrapper d-flex align-items-center col-auto">
                <!-- Logo For Mobile View -->
                <a class="navbar-brand navbar-brand-mobile" href="/">
                    <img class="img-fluid w-100" src="{{ asset('img/images.jpeg') }}" alt="Đề Tài Xây Dựng App Bán Sách">
                </a>
                <!-- End Logo For Mobile View -->

                <!-- Logo For Desktop View -->
                <a class="navbar-brand navbar-brand-desktop" href="http://172.8.180.66:8000/api/product-management">
                    <img class="side-nav-show-on-closed" src="{{ asset('img/images.jpeg') }}" alt="Đề Tài Xây Dựng App Bán Sách" style="width: auto; height: 33px;">
                    <img class="side-nav-hide-on-closed" src="{{ asset('img/logo_pc.png') }}" alt="Đề Tài Xây Dựng App Bán Sách" style="width: auto; height: 33px;">
                </a>
                <!-- End Logo For Desktop View -->
            </div>

            <div class="header-content col px-md-3">
                <div class="d-flex align-items-center">
                    <!-- Side Nav Toggle -->
                    <a class="js-side-nav header-invoker d-flex mr-md-2" href="#" data-close-invoker="#sidebarClose" data-target="#sidebar" data-target-wrapper="body">
                        <i class="gd-align-left"></i>
                    </a>
                    <!-- End Side Nav Toggle -->

                    <!-- User Notifications -->
                    <div class="dropdown ml-auto">
                        <a id="notificationsInvoker" class="header-invoker" href="#" aria-controls="notifications" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#notifications" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                            <span class="indicator indicator-bordered indicator-top-right indicator-primary rounded-circle"></span>
                            <i class="gd-bell"></i>
                        </a>

                        <div id="notifications" class="dropdown-menu dropdown-menu-center py-0 mt-4 w-18_75rem w-md-22_5rem unfold-css-animation unfold-hidden" aria-labelledby="notificationsInvoker" style="animation-duration: 300ms;">
                            <div class="card">
                                <div class="card-header d-flex align-items-center border-bottom py-3">
                                    <h5 class="mb-0">Notifications</h5>
                                    <a class="link small ml-auto" href="#">Clear All</a>
                                </div>

                                <div class="card-body p-0">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center text-nowrap mb-2">
                                                <i class="gd-info-alt icon-text text-primary mr-2"></i>
                                                <h6 class="font-weight-semi-bold mb-0">New Update</h6>
                                                <span class="list-group-item-date text-muted ml-auto">just now</span>
                                            </div>
                                            <p class="mb-0">
                                                Order <strong>#10000</strong> has been updated.
                                            </p>
                                            <a class="list-group-item-closer text-muted" href="#"><i class="gd-close"></i></a>
                                        </div>
                                        <div class="list-group-item list-group-item-action">
                                            <div class="d-flex align-items-center text-nowrap mb-2">
                                                <i class="gd-info-alt icon-text text-primary mr-2"></i>
                                                <h6 class="font-weight-semi-bold mb-0">New Update</h6>
                                                <span class="list-group-item-date text-muted ml-auto">just now</span>
                                            </div>
                                            <p class="mb-0">
                                                Order <strong>#10001</strong> has been updated.
                                            </p>
                                            <a class="list-group-item-closer text-muted" href="#"><i class="gd-close"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End User Notifications -->
                    <!-- User Avatar -->
                    <div class="dropdown mx-3 dropdown ml-2">
                        <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-target="#profileMenu" data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-animation-in="fadeIn" data-unfold-animation-out="fadeOut">
                            <!--img class="avatar rounded-circle mr-md-2" src="#" alt="John Doe"-->
                            <span class="mr-md-2 avatar-placeholder">J</span>
                            <span class="d-none d-md-block">John Doe</span>
                            <i class="gd-angle-down d-none d-md-block ml-2"></i>
                        </a>

                        <ul id="profileMenu" class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut" aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                            <li class="unfold-item">
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-user"></i>
                                    </span>
                                    My Profile
                                </a>
                            </li>
                            <li class="unfold-item unfold-item-has-divider">
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-power-off"></i>
                                    </span>
                                    Sign Out
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End User Avatar -->
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <main class="main">
        <!-- Sidebar Nav -->
        <aside id="sidebar" class="js-custom-scroll side-nav">
            <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">
                <!-- Title -->
                <li class="side-nav-menu-item side-nav-has-menu active side-nav-opened">
                    <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subUsers">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-dashboard"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Các Loại Sách</span>
                        <span class="side-nav-control-icon d-flex">
                            <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>

                    <!-- Users: subUsers -->
                    <ul id="subUsers" class="side-nav-menu side-nav-menu-second-level mb-0" style="display: block;">
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="http://172.8.180.66:8000/api/all-product-admin">Tất Cả Sản Phẩm</a>
                        </li>
                        <li class="side-nav-menu-item active">
                            <a class="side-nav-menu-link" href="http://172.8.180.66:8000/api/add-product">Thêm Sản Phẩm</a>
                        </li>
                    </ul>
                    <!-- End Users: subUsers -->
                </li>
                <!-- End Users -->
            </ul>
        </aside>
        <!-- End Sidebar Nav -->

        <div class="content">
            <div class="container mt-5">
                <h2 class="text-center">Thêm Sản Phẩm</h2>
                <form id="importForm">
                    <div class="mb-3">
                        <label for="googleSheetLink" class="form-label">Google Sheets Link</label>
                        <input type="text" class="form-control" id="googleSheetLink" placeholder="Nhập liên kết Google Sheets">
                    </div>
                    <button type="submit" class="btn btn-primary">Nhập Dữ Liệu</button>
                </form>
                <button id="sendDataBtn" class="btn btn-success mt-3">Gửi Dữ Liệu Lên Server</button>
                <div id="message" class="alert d-none" role="alert"></div>

                <div id="sheetsIdContainer" class="mt-3">
                    <p><strong>ID Google Sheets:</strong> <span id="sheetsIdDisplay"></span></p>
                </div>

                <div id="dataTableContainer" class="d-none mt-4">
                    <h3 class="text-center">Dữ Liệu Sản Phẩm</h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Danh Mục</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Mô Tả Chi Tiết</th>
                                <th>Mô Tả Ngắn</th>
                                <th>Giá</th>
                                <th>Giá Khuyến Mãi</th>
                                <th>Hình Ảnh</th>
                                <th>Album</th>
                                <th>PDF</th>
                                <th>Số Lượng</th>
                            </tr>
                        </thead>
                        <tbody id="dataTableBody"></tbody>
                    </table>
                </div>
            </div>

            <!-- Template JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>

            <!-- Custom JS -->
            <script>
                let excelData = [];

                document.getElementById('importForm').addEventListener('submit', async (event) => {
                    event.preventDefault();
                    const googleSheetLink = document.getElementById('googleSheetLink').value;
                    await importExcelFromGoogleSheet(googleSheetLink);
                });

                document.getElementById('sendDataBtn').addEventListener('click', async () => {
                    await sendDataToServer();
                });

                async function importExcelFromGoogleSheet(googleSheetLink) {
                    try {
                        const sheetsId = googleSheetLink.match(/\/d\/(.*)\/edit/)[1];
                        const url = `https://docs.google.com/spreadsheets/d/${sheetsId}/gviz/tq?tqx=out:json`;

                        document.getElementById('sheetsIdDisplay').textContent = sheetsId;

                        const response = await axios.get(url);
                        const jsonResponse = response.data.substring(47, response.data.length - 2);
                        const jsonData = JSON.parse(jsonResponse);

                        if (jsonData.table && jsonData.table.rows) {
                            excelData = [];
                            for (let row of jsonData.table.rows) {
                                const rowData = [];
                                for (let i = 0; i < jsonData.table.cols.length; i++) {
                                    rowData.push(row.c && row.c[i] && row.c[i].v ? row.c[i].v : '');
                                }
                                excelData.push(rowData);
                            }

                            excelData.shift(); // Remove header row
                            displayExcelData();
                            showMessage('Dữ liệu đã được nhập thành công.', 'success');
                        } else {
                            showMessage('Không có dữ liệu từ Google Sheets.', 'danger');
                        }
                    } catch (error) {
                        console.error('Lỗi khi lấy dữ liệu Google Sheets:', error);
                        showMessage('Lỗi khi lấy dữ liệu Google Sheets.', 'danger');
                    }
                }

                function displayExcelData() {
                    const dataTableBody = document.getElementById('dataTableBody');
                    dataTableBody.innerHTML = '';
                    excelData.forEach((row) => {
                        const [category, productName, detailedDescription, shortDescription, price, promotionalPrice, imgProduct, album, pdfFile, quantity] = row;

                        const albumImages = album ? album.split(',').map(url => `<img src="${url.trim()}" class="img-preview" alt="Album Image" style="width: 100px; height: 100px;">`).join('') : '';
                        const pdfLink = pdfFile ? `<a href="${pdfFile}" class="pdf-preview" target="_blank">Xem PDF</a>` : '';
                        const imgPreview = imgProduct ? `<img src="${imgProduct}" class="img-preview" alt="Product Image" style="width: 100px; height: 100px;">` : '';

                        const rowHTML = `
<tr>
    <td>${category || ''}</td>
    <td>${productName || ''}</td>
    <td>${detailedDescription || ''}</td>
    <td>${shortDescription || ''}</td>
    <td>${parseFloat(price).toLocaleString('vi-VN', {style: 'currency', currency: 'VND'}) || 0}</td>
    <td>${parseFloat(promotionalPrice).toLocaleString('vi-VN', {style: 'currency', currency: 'VND'}) || 0}</td>
    <td>${imgPreview}</td>
    <td>${albumImages}</td>
    <td>${pdfLink}</td>
    <td>${parseFloat(quantity) || 0}</td>
</tr>
`;
                        dataTableBody.insertAdjacentHTML('beforeend', rowHTML);
                    });

                    document.getElementById('dataTableContainer').classList.remove('d-none');
                }

                async function sendDataToServer() {
                    if (excelData.length < 1) {
                        showMessage('Không có dữ liệu để gửi lên server.', 'danger');
                        return;
                    }

                    for (let i = 0; i < excelData.length; i++) {
                        const [category, productName, detailedDescription, shortDescription, price, promotionalPrice, imgProduct, album, pdfFile, quantity] = excelData[i];

                        const data = new FormData();
                        data.append('category', category || '');
                        data.append('product_name', productName || '');
                        data.append('detailed_description', detailedDescription || '');
                        data.append('short_description', shortDescription || '');
                        data.append('price', parseFloat(price) || 0);
                        data.append('promotional_price', parseFloat(promotionalPrice) || 0);
                        data.append('quantity', parseFloat(quantity) || 0);

                        if (imgProduct) {
                            const imgProductUrl = imgProduct;
                            try {
                                const imgResponse = await axios.get(imgProductUrl, {
                                    responseType: 'arraybuffer'
                                });
                                const imgBlob = new Blob([imgResponse.data], {
                                    type: 'image/jpeg'
                                });
                                data.append('imgproduct', imgBlob, 'imgproduct.jpg');
                            } catch (error) {
                                console.error('Lỗi khi tải ảnh:', error);
                            }
                        }

                        if (album) {
                            const albumUrls = album.split(',').map(url => url.trim());
                            for (let i = 0; i < albumUrls.length; i++) {
                                const albumUrl = albumUrls[i];
                                try {
                                    const albumResponse = await axios.get(albumUrl, {
                                        responseType: 'arraybuffer'
                                    });
                                    const albumBlob = new Blob([albumResponse.data], {
                                        type: 'image/jpeg'
                                    });
                                    data.append('album[]', albumBlob, `album_${i}.jpg`);
                                } catch (error) {
                                    console.error('Lỗi khi tải album:', error);
                                }
                            }
                        }

                        if (pdfFile) {
                            const pdfFileUrl = pdfFile;
                            try {
                                const pdfResponse = await axios.get(pdfFileUrl, {
                                    responseType: 'arraybuffer'
                                });
                                const pdfBlob = new Blob([pdfResponse.data], {
                                    type: 'application/pdf'
                                });
                                data.append('pdf_file', pdfBlob, 'pdf_file.pdf');
                            } catch (error) {
                                console.error('Lỗi khi tải PDF:', error);
                            }
                        }

                        try {
                            const response = await axios.post('http://172.8.180.66:8000/api/auth/addproduct', data, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            });
                            if (response.status === 200) {
                                showMessage('Dữ liệu đã được gửi lên server thành công.', 'success');
                            } else {
                                showMessage('Lỗi khi gửi dữ liệu lên server.', 'danger');
                            }
                        } catch (error) {
                            console.error('Lỗi khi gửi dữ liệu lên server:', error);
                            showMessage('Lỗi khi gửi dữ liệu lên server.', 'danger');
                        }
                    }
                }

                function showMessage(message, type) {
                    const messageDiv = document.getElementById('message');
                    messageDiv.textContent = message;
                    messageDiv.className = `alert alert-${type}`;
                }
            </script>



            <!-- Footer -->
            <footer class="small p-3 px-md-4 mt-auto">
                <div class="row justify-content-between">
                    <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
                        <ul class="list-dot list-inline mb-0">
                            <li class="list-dot-item list-dot-item-primary d-inline-block mr-3 mb-0"><a class="link-dark" href="#">FAQ</a></li>
                            <li class="list-dot-item list-dot-item-primary d-inline-block mr-3 mb-0"><a class="link-dark" href="#">Support</a></li>
                        </ul>
                    </div>
                    <div class="col-lg text-center text-lg-right">
                        &copy; 2023 Đề Tài Xây Dựng App Bán Sách. All Rights Reserved.
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
    </main>

    <!-- Scripts -->

</body>

</html>