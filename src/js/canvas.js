/* eslint no-param-reassign: ["error", {
  "props": true,
  "ignorePropertyModificationsFor": ["line"],
}] */

class Background {
  constructor(canvas) {
    this.canvas = canvas;
    this.ctx = canvas.getContext('2d');
    this.polylines = [];
    this.frameCount = 0;
    this.backgroundColor = '#fff';

    const TAU = Math.PI * 2;
    const ISO_ANGLE = TAU * (45 / 360);
    this.ANGLES = [ISO_ANGLE, -ISO_ANGLE, Math.PI - ISO_ANGLE, Math.PI + ISO_ANGLE];
    this.NUM_LINES = 10;
    this.NUM_SEGMENT = 8;
    this.SEGMENT_LENGTH = 120;
    this.RESET_FACTOR = 5;
  }

  // change canvas background
  changeBackground(newColor) {
    this.backgroundColor = newColor;
  }

  // convert {r,g,b} to rgba string
  static createRgbString(color) {
    return `rgb(${color.r},${color.g},${color.b})`;
  }

  // random integer in range [0, m)
  static randomInt(m) {
    return Math.floor(Math.random() * m);
  }

  /**
   * Build or reset a line with a random color and empty points.
   */
  buildLine(line) {
    const obj = line || {};
    obj.color = {};
    obj.color.r = this.constructor.randomInt(3 * 64);
    obj.color.g = this.constructor.randomInt(2 * 64);
    obj.color.b = this.constructor.randomInt(4 * 64);
    obj.points = [];
    return obj;
  }

  /**
   * Random isometric angle
   */
  nextAngle() {
    const idx = this.constructor.randomInt(this.ANGLES.length);
    return this.ANGLES[idx];
  }


  /**
  * Next point is a random point within four angles from the start.
  * @param line the array of points to add to.
  * @param i the last index to start from
  * @param point the default starting point.
  */
  getNextPoint(line, i, point) {
    const nextPoint = point || {};
    line.angle = this.nextAngle(line.angle);
    nextPoint.x = line.points[i - 1].x + (Math.cos(line.angle) * this.SEGMENT_LENGTH);
    nextPoint.y = line.points[i - 1].y + (Math.sin(line.angle) * this.SEGMENT_LENGTH);
    line.points.push(nextPoint);
  }

  /**
   * Init a polyline
   */
  initPolyLine(line) {
    line.points.push({
      x: this.constructor.randomInt(this.canvas.width),
      y: this.constructor.randomInt(this.canvas.height),
    });
    for (let i = 1; i < this.NUM_SEGMENT; i += 1) {
      this.getNextPoint(line, i);
    }
    return line;
  }

  /**
   * Draw a line on the canvas.
   */
  drawLine(line) {
    this.ctx.strokeStyle = this.constructor.createRgbString(line.color);
    for (let i = 1; i < line.points.length; i += 1) {
      this.ctx.beginPath();
      this.ctx.moveTo(line.points[i - 1].x, line.points[i - 1].y);
      this.ctx.lineTo(line.points[i].x, line.points[i].y);
      this.ctx.stroke();
    }
  }

  /**
   * check if point is inside the canvas region
   */
  isPointInside(point) {
    return (point.y > 0
      && point.y < this.canvas.height
      && point.x < this.canvas.width
      && point.x > 0);
  }

  // reset a line
  resetLine(line) {
    const idx = this.polylines.indexOf(line);
    const removedLine = this.polylines.splice(idx, 1)[0];
    const newLine = this.buildLine(removedLine); // reset the line
    const newPolyline = this.initPolyLine(newLine);
    this.polylines.push(newPolyline);
  }

  /**
   * make a line move down
   */
  moveLine(line) {
    for (let i = 0; i < line.points.length; i += 1) {
      line.points[i].y += 0.01;
    }
    // check if point is out of view
    const pointsInside = line.points.filter(l => this.isPointInside(l));

    // if line has no point in view, reset it
    if (pointsInside.length === 0) {
      this.resetLine(line);
    }
  }

  /**
   * Makes the lines go down.
   */
  move() {
    for (const line of this.polylines) {
      this.moveLine(line);
    }
  }

  /**
  * Removes first point from the line and add a new one.
  */
  shiftPoint(line) {
    const firstPoint = line.points.shift();
    this.getNextPoint(line, line.points.length, firstPoint);
  }

  /**
   * starts animation
   */
  animate() {
    this.ctx.fillStyle = this.backgroundColor;
    this.ctx.fillRect(0, 0, this.canvas.width, this.canvas.height);

    // draw
    this.move();
    for (const line of this.polylines) {
      this.drawLine(line);
    }

    if (this.frameCount % this.RESET_FACTOR === 0) {
      for (const line of this.polylines) {
        this.shiftPoint(line);
      }
    }
    this.frameCount += 1;
    window.requestAnimationFrame(this.animate.bind(this));
  }

  /**
   * Resize canvas to viewport dimensions.
   */
  resize() {
    this.canvas.width = window.innerWidth;
    this.canvas.height = window.innerHeight;
  }

  init() {
    for (let i = 0; i < this.NUM_LINES; i += 1) {
      const line = this.buildLine();
      this.polylines.push(line);
    }
    for (let i = 0, l = this.polylines.length; i < l; i += 1) {
      this.initPolyLine(this.polylines[i]);
    }
    // .forEach(this.initPolyLine);
    this.resize();
    this.animate();
    window.addEventListener('resize', this.resize);
  }
}

const $canvas = document.getElementById('canvas');
const bg = new Background($canvas);
bg.init();
if (!isFrontPage()) bg.changeBackground('#000');
