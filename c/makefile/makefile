main:max.o min.o main.o
	gcc max.o min.o main.o -o main
main.o:main.c
	gcc -c main.c
min.o:min.c
	gcc -c min.c
max.o:max.h max.c
	gcc -c max.h max.c
# 用".PHONY {目标名}"定义一个伪目标
#
# # 用"make {目标名}"执行该伪目标
.PHONY:clean
clean:
	@rm -f main *.o *.gch
	@echo 'clean'
