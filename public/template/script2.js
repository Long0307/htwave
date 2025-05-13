canvas9  = document.getElementsByClassName('layer9')[0].getContext('2d');
canvas10 = document.getElementsByClassName('layer10')[0].getContext('2d');
canvas11 = document.getElementsByClassName('layer11')[0].getContext('2d');
canvas12 = document.getElementsByClassName('layer12')[0].getContext('2d');

console.log("canvas4 = ", canvas4)

// Dữ liệu cho biểu đồ (ví dụ)
data = [50, 50];
labels = ['Giá trị 1', 'Giá trị 2'];
colors = ['#adc6f8', '#071f4e'];

// Bán kính của biểu đồ hình tròn
radius = 106;
// Bán kính của hình tròn trắng ở trung tâm
innerRadius = 94;
// Bán kính của hình tròn bên trong
innerCircleRadius = 100;
// Màu sắc của hình tròn bên trong
innerCircleColor = '#FFA500'; // Màu cam

// Tính toán tổng giá trị
total = data.reduce((sum, value) => sum + value, 0);

// Vẽ các lớp
drawLayer9(canvas9);
drawLayer10(canvas10);
drawLayer11(canvas11);
drawLayer12(canvas12);

function drawLayer9(ctx) {
    // Vẽ lớp 1 (m10u hồng)
    ctx.beginPath();
    ctx.moveTo(150, 150); // Tâm của canvas
    ctx.arc(150, 150, radius,  0, 2 * Math.PI); // Bắt đầu từ 180 độ và kết thúc ở 0 độ
    ctx.closePath();
    ctx.fillStyle = colors[0];
    ctx.fill();
}

function drawLayer10(ctx) {
  // Vẽ lớp 2 (màu trắng)
  ctx.beginPath();
  ctx.arc(150, 150, innerCircleRadius, 0, 2 * Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
}

function drawLayer11(ctx) {
    // Tính toán góc bắt đầu và kết thúc của màu xanh
    startAngle = -Math.PI / 2; // Bắt đầu từ 12 giờ (0 radian)
    endAngle = startAngle + (2 * Math.PI * 0.7); // Kết thúc ở 70% của toàn bộ vòng tròn

    // Vẽ lớp 3 (màu xanh)
    ctx.beginPath();
    ctx.moveTo(150, 150);
    ctx.arc(150, 150, radius, startAngle, endAngle);
    ctx.closePath();
    ctx.fillStyle = colors[1];
    ctx.fill();
}

function drawLayer12(ctx) {
  // Vẽ lớp 4 (màu trắng)
  ctx.beginPath();
  ctx.arc(150, 150, innerRadius, 0, 2 * Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
}