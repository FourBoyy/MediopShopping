$(document).ready(function () {
	// Kiểm tra xem thẻ canvas có tồn tại trên trang hay không trước khi vẽ
	if ($("#basiclinechart").length > 0) {

		// Nhận dữ liệu được truyền từ các biến window toàn cục ở file Blade sang
		var revenueData = window.chartRevenueData || [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
		var ordersData = window.chartOrdersData || [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

		var ctx = document.getElementById("basiclinechart").getContext("2d");

		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [{
					label: "Doanh Thu (VND)",
					fill: true,
					backgroundColor: 'rgba(101, 118, 255, 0.1)',
					borderColor: '#6576ff',
					pointBackgroundColor: '#6576ff',
					data: revenueData,
					borderWidth: 2,
					yAxisID: 'y-axis-1'
				},
				{
					label: "Số Đơn Hàng",
					fill: false,
					backgroundColor: 'transparent',
					borderColor: '#ff5252',
					pointBackgroundColor: '#ff5252',
					data: ordersData,
					borderWidth: 2,
					yAxisID: 'y-axis-2'
				}]
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					labels: { fontColor: '#fff' }
				},
				scales: {
					xAxes: [{
						gridLines: { color: 'rgba(255, 255, 255, 0.05)' },
						ticks: {
							fontColor: '#fff', callback: function (value, index, values) {
								return value.toLocaleString('vi-VN');
							}
						}

					}],
					yAxes: [{
						type: 'linear',
						display: true,
						position: 'left',
						id: 'y-axis-1',
						gridLines: { color: 'rgba(255, 255, 255, 0.05)' },
						ticks: {
							fontColor: '#6576ff', callback: function (value, index, values) {
								return value.toLocaleString('vi-VN');
							}
						}
					}, {
						type: 'linear',
						display: true,
						position: 'right',
						id: 'y-axis-2',
						gridLines: { drawOnChartArea: false },
						ticks: { fontColor: '#ff5252' }
					}]
				},
				tooltips: {
					mode: 'index',
					intersect: false,
					callbacks: {
						label: function (tooltipItem, data) {
							// Lấy tên nhãn của Dataset (Ví dụ: "Doanh Thu (VND)" hoặc "Số Đơn Hàng")
							var label = data.datasets[tooltipItem.datasetIndex].label || '';
							if (label) {
								label += ': ';
							}

							// Lấy giá trị số hiện tại và ép định dạng thành dấu chấm phân cách Việt Nam
							var value = tooltipItem.yLabel;
							label += Number(value).toLocaleString('vi-VN');

							return label;
						}
					}
				}
			}

		});
	}

});