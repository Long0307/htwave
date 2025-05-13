canvas1 = document.getElementsByClassName('layer1')[0].getContext('2d');
canvas2 = document.getElementsByClassName('layer2')[0].getContext('2d');
canvas3 = document.getElementsByClassName('layer3')[0].getContext('2d');
canvas4 = document.getElementsByClassName('layer4')[0].getContext('2d');

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
drawLayer1(canvas1);
drawLayer2(canvas2);
drawLayer3(canvas3);
drawLayer4(canvas4);

function drawLayer1(ctx) {
    // Vẽ lớp 1 (màu hồng)
    ctx.beginPath();
    ctx.moveTo(150, 150); // Tâm của canvas
    ctx.arc(150, 150, radius,  0, 2 * Math.PI); // Bắt đầu từ 180 độ và kết thúc ở 0 độ
    ctx.closePath();
    ctx.fillStyle = colors[0];
    ctx.fill();
}

function drawLayer2(ctx) {
  // Vẽ lớp 2 (màu trắng)
  ctx.beginPath();
  ctx.arc(150, 150, innerCircleRadius, 0, 2 * Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
}

function drawLayer3(ctx) {
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

function drawLayer4(ctx) {
  // Vẽ lớp 4 (màu trắng)
  ctx.beginPath();
  ctx.arc(150, 150, innerRadius, 0, 2 * Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
}