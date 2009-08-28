.PHONY: all clean

all: html pdf info dvi ps clean

html: bibliosoph.texi bibliosoph.texi.init
	texi2html --init-file=bibliosoph.texi.init bibliosoph.texi

pdf: bibliosoph.texi
	texi2pdf bibliosoph.texi

info: bibliosoph.texi
	makeinfo bibliosoph.texi


dvi: bibliosoph.texi
	tex bibliosoph.texi
	texindex bibliosoph.??
	tex bibliosoph.texi
	texindex bibliosoph.??
	tex bibliosoph.texi
	texindex bibliosoph.??

print_pdf: dvi
	dvipdf bibliosoph.dvi

ps: dvi
	dvips bibliosoph.dvi

clean:
	rm -f bibliosoph.cp   bibliosoph.fns  bibliosoph.kys  bibliosoph.pgs  \
	      bibliosoph.aux  bibliosoph.cps  bibliosoph.fn   bibliosoph.ky   \
	      bibliosoph.log  bibliosoph.pg   bibliosoph.tmp  bibliosoph.toc  \
	      bibliosoph.tp   bibliosoph.tps  bibliosoph.vr   bibliosoph.vrs

all_clean:
	rm -f bibliosoph.dvi  bibliosoph.pdf  bibliosoph.info bibliosoph.html
