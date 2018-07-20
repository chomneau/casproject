(function() {
    /*global Modernizr:true */
    'use strict';
    (function($) {
        $.fn.extend({
            mgPgnation: function(options) {
                /* func :: calculate width of each page num */
                /* func :: draw magic line */
                /* func :: update prev text */
                var $curNav, $magicLine, $magicNav, $mainNav, $nextNav, $pgnNav, $prevNav, $prevNavText, $this, calPgnWidth, magicDraw, prevNavWidth, prevText, showPrevNext, updatePrevText;
                $this = $(this);
                if ($this.length) {
                    $mainNav = this.children();
                    $pgnNav = $this.find('.pgn__item');
                    $curNav = $this.find('.current');
                    $magicNav = $this.find('a');
                    $prevNav = $this.find('.prev');
                    $nextNav = $this.find('.next');
                    $prevNavText = $prevNav.find('.pgn__prev-txt');
                    updatePrevText = function() {
                        $prevNavText = $prevNav.find('.pgn__prev-txt');
                        return $prevNavText.html('Prev');
                    };
                    calPgnWidth = function() {
                        var pgnWidth, prevWidth, vsbNav, vsbNavs;
                        // number of visible <a> plus <strong class="current">
                        vsbNav = $this.find('.pgn__item a:visible').length + 1;
                        vsbNavs = vsbNav + 2;
                        prevWidth = 100 / vsbNavs;
                        pgnWidth = 100 - prevWidth * 2;
                        $prevNav.css('width', prevWidth + '%');
                        $nextNav.css('width', prevWidth + '%');
                        $pgnNav.css('width', pgnWidth + '%');
                        // <a> and <strong>
                        return $pgnNav.find('a, strong').css('width', 100 / vsbNav + '%');
                    };
                    /* func :: calculate and display prev/next */
                    // 85px - display full text
                    showPrevNext = function() {
                        var prevNavWidth;
                        prevNavWidth = $prevNav.innerWidth();
                        if (prevNavWidth > 100) {
                            $this.addClass('fullprevnext');
                            // display Previous
                            return $prevNavText.html('Previous');
                        } else if (prevNavWidth < 101 && prevNavWidth > 60) {
                            $this.addClass('fullprevnext');
                            // display Prev
                            return $prevNavText.html('Prev');
                        } else {
                            return $this.removeClass('fullprevnext');
                        }
                    };
                    magicDraw = function() {
                        // draw init magic line
                        $magicLine.width($curNav.width());
                        if ($curNav.position() !== void 0) {
                            $magicLine.css('left', $curNav.position().left);
                        }

                        // assign orig values
                        $magicLine.data('origLeft', $magicLine.position().left);
                        return $magicLine.data('origWidth', $magicLine.width());
                    };
                    // END funcs

                    // create magic line
                    $mainNav.append('<li class="pgn__magic-line">');

                    // declare magic line
                    $magicLine = $this.find('.pgn__magic-line');
                    // add extra class & element if no prev or next
                    prevNavWidth = $prevNav.innerWidth();
                    if (prevNavWidth > 100) {
                        prevText = 'Previous';
                    } else {
                        prevText = 'Prev';
                    }
                    if (!$prevNav.children().length) {
                        $prevNav.addClass('disabled');
                        $prevNav.append('<a rel="prev"><i class="pgn__prev-icon icon-angle-left"></i><span class="pgn__prev-txt">' + prevText + '</span></a>');
                    }
                    if (!$nextNav.children().length) {
                        $nextNav.addClass('disabled');
                        $nextNav.append('<a rel="next"><i class="pgn__next-icon icon-angle-right"></i><span class="pgn__next-txt">Next</span></a>');
                    }
                    // calculate pgn width
                    calPgnWidth();
                    // show prev/next
                    showPrevNext();
                    // draw magic line
                    magicDraw();

                    // when hover
                    $magicNav.hover((function() {
                        var $el, leftPos, newWidth;
                        $el = $(this);
                        leftPos = $el.position().left;
                        newWidth = $el.width();

                        // animate magic line
                        return $magicLine.stop().animate({
                            left: leftPos,
                            width: newWidth
                        });
                    }), function() {
                        return $magicLine.stop().animate({
                            left: $magicLine.data('origLeft'),
                            width: $magicLine.data('origWidth')
                        });
                    });
                    /* Window Resize Changes */
                    return window.addEventListener('resize', function() {
                        updatePrevText();
                        calPgnWidth();
                        showPrevNext();
                        return magicDraw();
                    });
                }
            }
        });
        // END mgPgnation()

        // call function here
        return $('.pgn').mgPgnation();
    })(jQuery);

}).call(this);

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7RUFBQTtFQUNBO0VBRUEsQ0FBQyxRQUFBLENBQUMsQ0FBRCxDQUFBO0lBQ0MsQ0FBQyxDQUFDLEVBQUUsQ0FBQyxNQUFMLENBQ0U7TUFBQSxVQUFBLEVBQVksUUFBQSxDQUFDLE9BQUQsQ0FBQSxFQUFBOzs7O0FBQ1YsWUFBQSxPQUFBLEVBQUEsVUFBQSxFQUFBLFNBQUEsRUFBQSxRQUFBLEVBQUEsUUFBQSxFQUFBLE9BQUEsRUFBQSxRQUFBLEVBQUEsWUFBQSxFQUFBLEtBQUEsRUFBQSxXQUFBLEVBQUEsU0FBQSxFQUFBLFlBQUEsRUFBQSxRQUFBLEVBQUEsWUFBQSxFQUFBO1FBQUEsS0FBQSxHQUFRLENBQUEsQ0FBRSxJQUFGO1FBRVIsSUFBRyxLQUFLLENBQUMsTUFBVDtVQUNFLFFBQUEsR0FBVyxJQUFDLENBQUEsUUFBRCxDQUFBO1VBQ1gsT0FBQSxHQUFVLEtBQUssQ0FBQyxJQUFOLENBQVcsWUFBWDtVQUNWLE9BQUEsR0FBVSxLQUFLLENBQUMsSUFBTixDQUFXLFVBQVg7VUFDVixTQUFBLEdBQVksS0FBSyxDQUFDLElBQU4sQ0FBVyxHQUFYO1VBQ1osUUFBQSxHQUFXLEtBQUssQ0FBQyxJQUFOLENBQVcsT0FBWDtVQUNYLFFBQUEsR0FBVyxLQUFLLENBQUMsSUFBTixDQUFXLE9BQVg7VUFDWCxZQUFBLEdBQWUsUUFBUSxDQUFDLElBQVQsQ0FBYyxnQkFBZDtVQUdmLGNBQUEsR0FBaUIsUUFBQSxDQUFBLENBQUE7WUFDZixZQUFBLEdBQWUsUUFBUSxDQUFDLElBQVQsQ0FBYyxnQkFBZDttQkFDZixZQUFZLENBQUMsSUFBYixDQUFrQixNQUFsQjtVQUZlO1VBS2pCLFdBQUEsR0FBYyxRQUFBLENBQUEsQ0FBQTtBQUVaLGdCQUFBLFFBQUEsRUFBQSxTQUFBLEVBQUEsTUFBQSxFQUFBLE9BQUE7O1lBQUEsTUFBQSxHQUFTLEtBQUss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QVUsR0FBRyxDQUFDLFFBQUosQ0FBQSxDQUFjLENBQUM7WUFDekIsUUFBQSxHQUFXLEdBQUcsQ0FBQyxLQUFKLENBQUEsRUFGWDs7O21CQUtBLFVBQVUsQ0FBQyxJQUFYLENBQUEsQ0FBaUIsQ0FBQyxPQUFsQixDQUNFO2NBQUEsSUFBQSxFQUFNLE9BQU47Y0FDQSxLQUFBLEVBQU87WUFEUCxDQURGO1VBTmUsQ0FBRCxDQUFoQixFQVNHLFFBQUEsQ0FBQSxDQUFBO21CQUNELFVBQVUsQ0FBQyxJQUFYLENBQUEsQ0FBaUIsQ0FBQyxPQUFsQixDQUNFO2NBQUEsSUFBQSxFQUFNLFVBQVUsQ0FBQyxJQUFYLENBQWdCLFVBQWhCLENBQU47Y0FDQSxLQUFBLEVBQU8sVUFBVSxDQUFDLElBQVgsQ0FBZ0IsV0FBaEI7WUFEUCxDQURGO1VBREMsQ0FUSCxFQXhGQTs7aUJBdUdBLE1BQU0sQ0FBQyxnQkFBUCxDQUF3QixRQUF4QixFQUFrQyxRQUFBLENBQUEsQ0FBQTtZQUNoQyxjQUFBLENBQUE7WUFDQSxXQUFBLENBQUE7WUFDQSxZQUFBLENBQUE7bUJBQ0EsU0FBQSxDQUFBO1VBSmdDLENBQWxDLEVBeEdGOztNQUhVO0lBQVosQ0FERixFQUFBOzs7O1dBb0hBLENBQUEsQ0FBRSxNQUFGLENBQVMsQ0FBQyxVQUFWLENBQUE7RUFySEQsQ0FBRCxDQUFBLENBdUhFLE1BdkhGO0FBSEEiLCJzb3VyY2VzQ29udGVudCI6WyIjIyNnbG9iYWwgTW9kZXJuaXpyOnRydWUgIyMjXG4ndXNlIHN0cmljdCdcblxuKCgkKSAtPlxuICAkLmZuLmV4dGVuZFxuICAgIG1nUGduYXRpb246IChvcHRpb25zKSAtPlxuICAgICAgJHRoaXMgPSAkKHRoaXMpXG5cbiAgICAgIGlmICR0aGlzLmxlbmd0aFxuICAgICAgICAkbWFpbk5hdiA9IEBjaGlsZHJlbigpXG4gICAgICAgICRwZ25OYXYgPSAkdGhpcy5maW5kKCcucGduX19pdGVtJylcbiAgICAgICAgJGN1ck5hdiA9ICR0aGlzLmZpbmQoJy5jdXJyZW50JylcbiAgICAgICAgJG1hZ2ljTmF2ID0gJHRoaXMuZmluZCgnYScpXG4gICAgICAgICRwcmV2TmF2ID0gJHRoaXMuZmluZCgnLnByZXYnKVxuICAgICAgICAkbmV4dE5hdiA9ICR0aGlzLmZpbmQoJy5uZXh0JylcbiAgICAgICAgJHByZXZOYXZUZXh0ID0gJHByZXZOYXYuZmluZCgnLnBnbl9fcHJldi10eHQnKVxuXG4gICAgICAgICMjIyBmdW5jIDo6IHVwZGF0ZSBwcmV2IHRleHQgIyMjXG4gICAgICAgIHVwZGF0ZVByZXZUZXh0ID0gLT5cbiAgICAgICAgICAkcHJldk5hdlRleHQgPSAkcHJldk5hdi5maW5kKCcucGduX19wcmV2LXR4dCcpXG4gICAgICAgICAgJHByZXZOYXZUZXh0Lmh0bWwgJ1ByZXYnXG5cbiAgICAgICAgIyMjIGZ1bmMgOjogY2FsY3VsYXRlIHdpZHRoIG9mIGVhY2ggcGFnZSBudW0gIyMjXG4gICAgICAgIGNhbFBnbldpZHRoID0gLT5cbiAgICAgICAgICAjIG51bWJlciBvZiB2aXNpYmxlIDxhPiBwbHVzIDxzdHJvbmcgY2xhc3M9XCJjdXJyZW50XCI+XG4gICAgICAgICAgdnNiTmF2ID0gJHRoaXMuZmluZCgnLnBnbl9faXRlbSBhOnZpc2libGUnKS5sZW5ndGggKyAxXG4gICAgICAgICAgdnNiTmF2cyA9IHZzYk5hdiArIDJcbiAgICAgICAgICBwcmV2V2lkdGggPSAxMDAgLyB2c2JOYXZzXG4gICAgICAgICAgcGduV2lkdGggPSAxMDAgLSBwcmV2V2lkdGggKiAyXG4gICAgICAgICAgJHByZXZOYXYuY3NzICd3aWR0aCcsIHByZXZXaWR0aCArICclJ1xuICAgICAgICAgICRuZXh0TmF2LmNzcyAnd2lkdGgnLCBwcmV2V2lkdGggKyAnJSdcbiAgICAgICAgICAkcGduTmF2LmNzcyAnd2lkdGgnLCBwZ25XaWR0aCArICclJ1xuICAgICAgICAgICMgPGE+IGFuZCA8c3Ryb25nPlxuICAgICAgICAgICRwZ25OYXYuZmluZCgnYSwgc3Ryb25nJykuY3NzICd3aWR0aCcsIDEwMCAvIHZzYk5hdiArICclJ1xuXG4gICAgICAgICMjIyBmdW5jIDo6IGNhbGN1bGF0ZSBhbmQgZGlzcGxheSBwcmV2L25leHQgIyMjXG4gICAgICAgICMgODVweCAtIGRpc3BsYXkgZnVsbCB0ZXh0XG4gICAgICAgIHNob3dQcmV2TmV4dCA9IC0+XG4gICAgICAgICAgcHJldk5hdldpZHRoID0gJHByZXZOYXYuaW5uZXJXaWR0aCgpXG5cbiAgICAgICAgICBpZiBwcmV2TmF2V2lkdGggPiAxMDBcbiAgICAgICAgICAgICR0aGlzLmFkZENsYXNzICdmdWxscHJldm5leHQnXG5cbiAgICAgICAgICAgICMgZGlzcGxheSBQcmV2aW91c1xuICAgICAgICAgICAgJHByZXZOYXZUZXh0Lmh0bWwgJ1ByZXZpb3VzJ1xuICAgICAgICAgIGVsc2UgaWYgcHJldk5hdldpZHRoIDwgMTAxIGFuZCBwcmV2TmF2V2lkdGggPiA2MFxuICAgICAgICAgICAgJHRoaXMuYWRkQ2xhc3MgJ2Z1bGxwcmV2bmV4dCdcblxuICAgICAgICAgICAgIyBkaXNwbGF5IFByZXZcbiAgICAgICAgICAgICRwcmV2TmF2VGV4dC5odG1sICdQcmV2J1xuICAgICAgICAgIGVsc2VcbiAgICAgICAgICAgICR0aGlzLnJlbW92ZUNsYXNzICdmdWxscHJldm5leHQnXG5cbiAgICAgICAgIyMjIGZ1bmMgOjogZHJhdyBtYWdpYyBsaW5lICMjI1xuICAgICAgICBtYWdpY0RyYXcgPSAtPlxuICAgICAgICAgICMgZHJhdyBpbml0IG1hZ2ljIGxpbmVcbiAgICAgICAgICAkbWFnaWNMaW5lLndpZHRoKCRjdXJOYXYud2lkdGgoKSlcbiAgICAgICAgICBpZiAkY3VyTmF2LnBvc2l0aW9uKCkgIT0gdW5kZWZpbmVkXG4gICAgICAgICAgICAkbWFnaWNMaW5lLmNzcyAnbGVmdCcsICRjdXJOYXYucG9zaXRpb24oKS5sZWZ0XG4gICAgICAgICAgXG4gICAgICAgICAgIyBhc3NpZ24gb3JpZyB2YWx1ZXNcbiAgICAgICAgICAkbWFnaWNMaW5lLmRhdGEgJ29yaWdMZWZ0JywgJG1hZ2ljTGluZS5wb3NpdGlvbigpLmxlZnRcbiAgICAgICAgICAkbWFnaWNMaW5lLmRhdGEgJ29yaWdXaWR0aCcsICRtYWdpY0xpbmUud2lkdGgoKVxuICAgICAgICAjIEVORCBmdW5jc1xuICAgICAgICBcbiAgICAgICAgIyBjcmVhdGUgbWFnaWMgbGluZVxuICAgICAgICAkbWFpbk5hdi5hcHBlbmQoJzxsaSBjbGFzcz1cInBnbl9fbWFnaWMtbGluZVwiPicpXG4gICAgICAgIFxuICAgICAgICAjIGRlY2xhcmUgbWFnaWMgbGluZVxuICAgICAgICAkbWFnaWNMaW5lID0gJHRoaXMuZmluZCgnLnBnbl9fbWFnaWMtbGluZScpXG5cbiAgICAgICAgIyBhZGQgZXh0cmEgY2xhc3MgJiBlbGVtZW50IGlmIG5vIHByZXYgb3IgbmV4dFxuICAgICAgICBwcmV2TmF2V2lkdGggPSAkcHJldk5hdi5pbm5lcldpZHRoKClcblxuICAgICAgICBpZiBwcmV2TmF2V2lkdGggPiAxMDBcbiAgICAgICAgICBwcmV2VGV4dCA9ICdQcmV2aW91cydcbiAgICAgICAgZWxzZVxuICAgICAgICAgIHByZXZUZXh0ID0gJ1ByZXYnXG5cbiAgICAgICAgaWYgISRwcmV2TmF2LmNoaWxkcmVuKCkubGVuZ3RoXG4gICAgICAgICAgJHByZXZOYXYuYWRkQ2xhc3MgJ2Rpc2FibGVkJ1xuICAgICAgICAgICRwcmV2TmF2LmFwcGVuZCAnPGEgcmVsPVwicHJldlwiPjxpIGNsYXNzPVwicGduX19wcmV2LWljb24gaWNvbi1hbmdsZS1sZWZ0XCI+PC9pPjxzcGFuIGNsYXNzPVwicGduX19wcmV2LXR4dFwiPicgKyBwcmV2VGV4dCArICc8L3NwYW4+PC9hPidcblxuICAgICAgICBpZiAhJG5leHROYXYuY2hpbGRyZW4oKS5sZW5ndGhcbiAgICAgICAgICAkbmV4dE5hdi5hZGRDbGFzcyAnZGlzYWJsZWQnXG4gICAgICAgICAgJG5leHROYXYuYXBwZW5kICc8YSByZWw9XCJuZXh0XCI+PGkgY2xhc3M9XCJwZ25fX25leHQtaWNvbiBpY29uLWFuZ2xlLXJpZ2h0XCI+PC9pPjxzcGFuIGNsYXNzPVwicGduX19uZXh0LXR4dFwiPk5leHQ8L3NwYW4+PC9hPidcblxuICAgICAgICAjIGNhbGN1bGF0ZSBwZ24gd2lkdGhcbiAgICAgICAgY2FsUGduV2lkdGgoKVxuXG4gICAgICAgICMgc2hvdyBwcmV2L25leHRcbiAgICAgICAgc2hvd1ByZXZOZXh0KClcblxuICAgICAgICAjIGRyYXcgbWFnaWMgbGluZVxuICAgICAgICBtYWdpY0RyYXcoKVxuICAgICAgICBcbiAgICAgICAgIyB3aGVuIGhvdmVyXG4gICAgICAgICRtYWdpY05hdi5ob3ZlciAoLT5cbiAgICAgICAgICAkZWwgPSAkKHRoaXMpXG4gICAgICAgICAgbGVmdFBvcyA9ICRlbC5wb3NpdGlvbigpLmxlZnRcbiAgICAgICAgICBuZXdXaWR0aCA9ICRlbC53aWR0aCgpXG4gICAgICAgICAgXG4gICAgICAgICAgIyBhbmltYXRlIG1hZ2ljIGxpbmVcbiAgICAgICAgICAkbWFnaWNMaW5lLnN0b3AoKS5hbmltYXRlXG4gICAgICAgICAgICBsZWZ0OiBsZWZ0UG9zXG4gICAgICAgICAgICB3aWR0aDogbmV3V2lkdGhcbiAgICAgICAgKSwgLT5cbiAgICAgICAgICAkbWFnaWNMaW5lLnN0b3AoKS5hbmltYXRlXG4gICAgICAgICAgICBsZWZ0OiAkbWFnaWNMaW5lLmRhdGEoJ29yaWdMZWZ0JylcbiAgICAgICAgICAgIHdpZHRoOiAkbWFnaWNMaW5lLmRhdGEoJ29yaWdXaWR0aCcpXG4gICAgICBcbiAgICAgICAgIyMjIFdpbmRvdyBSZXNpemUgQ2hhbmdlcyAjIyNcbiAgICAgICAgd2luZG93LmFkZEV2ZW50TGlzdGVuZXIgJ3Jlc2l6ZScsIC0+XG4gICAgICAgICAgdXBkYXRlUHJldlRleHQoKVxuICAgICAgICAgIGNhbFBnbldpZHRoKClcbiAgICAgICAgICBzaG93UHJldk5leHQoKVxuICAgICAgICAgIG1hZ2ljRHJhdygpXG4gICMgRU5EIG1nUGduYXRpb24oKVxuICAgICAgXG4gICMgY2FsbCBmdW5jdGlvbiBoZXJlIFxuICAkKCcucGduJykubWdQZ25hdGlvbigpXG5cbikgalF1ZXJ5Il19
//# sourceURL=coffeescript