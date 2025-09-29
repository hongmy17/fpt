#include <stdio.h>
int n;
int main() {
	int x, y;
	x = 5;
	y = 6;
	{
		int x = 4;
		printf("x = %d\n", x);
		y += 1;
	}
	printf("n = %d\n", n);
	printf("x = %d\n", x);
	printf("y = %d\n", y);
	return 0;
}
