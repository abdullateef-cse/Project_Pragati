/**
 * Project Pragati - Gallery: populate grid with images
 * Loads images from the Gallery folder with proper descriptions
 */

(function () {
  'use strict';

  var galleryGrid = document.querySelector('.gallery-grid');
  if (!galleryGrid) return;

  var images = [
    { src: 'Gallery/1.png', caption: 'Women Empowerment Training' },
    { src: 'Gallery/2.png', caption: 'Community Workshop' },
    { src: 'Gallery/3.png', caption: 'Entrepreneurship Development' },
    { src: 'Gallery/4.png', caption: 'Skill Enhancement Session' },
    { src: 'Gallery/5.png', caption: 'Village Community Meeting' },
    { src: 'Gallery/6.png', caption: 'Rural Women Leaders' },
    { src: 'Gallery/7.png', caption: 'Business Training Program' },
    { src: 'Gallery/8.png', caption: 'Mentorship Initiative' },
    { src: 'Gallery/9.png', caption: 'Women Entrepreneurs' },
    { src: 'Gallery/10.png', caption: 'Project Pragati Activity' },
    { src: 'Gallery/11.png', caption: 'Community Engagement' },
    { src: 'Gallery/12.png', caption: 'Sakhi Development Program' },
    { src: 'Gallery/13.png', caption: 'Leadership Training' },
    { src: 'Gallery/14.png', caption: 'Women Collaboration' },
    { src: 'Gallery/15.png', caption: 'Business Success Stories' },
    { src: 'Gallery/16.png', caption: 'Community Impact' },
    { src: 'Gallery/17.png', caption: 'Rural Entrepreneurship' },
    { src: 'Gallery/18.png', caption: 'Women Empowerment Initiative' },
    { src: 'Gallery/19.png', caption: 'Coaching Session' },
    { src: 'Gallery/20.png', caption: 'Village Development' },
    { src: 'Gallery/21.png', caption: 'Project Pragati Team' },
    { src: 'Gallery/22.png', caption: 'Success Story' },
    { src: 'Gallery/23.png', caption: 'Community Transformation' }
  ];

  function createItem(item, index) {
    var figure = document.createElement('figure');
    figure.className = 'gallery-item';

    var img = document.createElement('img');
    img.src = item.src;
    img.alt = item.caption || 'Gallery image ' + (index + 1);
    img.loading = 'lazy';

    img.onerror = function () {
      var placeholder = document.createElement('div');
      placeholder.className = 'gallery-placeholder';
      placeholder.textContent = item.caption || 'Image ' + (index + 1);
      figure.appendChild(placeholder);
      img.remove();
    };

    figure.appendChild(img);

    if (item.caption) {
      var cap = document.createElement('figcaption');
      cap.textContent = item.caption;
      figure.appendChild(cap);
    }

    return figure;
  }

  images.forEach(function (item, i) {
    galleryGrid.appendChild(createItem(item, i));
  });
})();
