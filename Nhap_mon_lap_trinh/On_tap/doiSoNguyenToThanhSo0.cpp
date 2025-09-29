#include <stdio.h>

bool kiemTraSoNguyenTo(int n) {
	for (int j = 2; j < n; j++)
		if (n % j == 0)
			return false;
	
	return true;
}

void inMang(int a[], int n) {
	for (int i = 0; i < n; i++)
		printf("%d ", a[i]);
}

void doiSoNguyenToThanhSo0(int a[], int n) {
	for (int i = 0; i < n; i++) {
		if (a[i] == 2) a[i] = 0;
		else if (a[i] > 1 && a[i] % 2 != 0) {
			bool soNguyenTo = kiemTraSoNguyenTo(a[i]);
			
			if (soNguyenTo) a[i] = 0;
		}
	}
	
	inMang(a, n);
}

int main() {
	int n;
	printf("Moi nhap n: ");
	scanf("%d", &n);
	
	printf("\n");
	int a[n];
	for (int i = 0; i < n; i++) {
		printf("a[%d]: ", i);
		scanf("%d", &a[i]);
	}
	
	printf("\n");
	doiSoNguyenToThanhSo0(a, n);
	return 0;
}
