#include <stdio.h>

int max(int a, int b, int c) {
	int max;
	if (a > b) max = a;
	else max = b;
	
	if (max > c) return max;
	else return c;
}

int main() {
	int a = 5, b = 9, c = 7;
	printf("So lon nhat cua 2 so la: %d", max(a, b, c));
	return 0;
}
