#include <stdio.h>
#include <conio.h>
#include <string.h>

int main() {
	char tenbo[50], tenme[50];
	int tuoibo, tuoime;
	
	printf("Nhap ten cua bo ban: ");
	gets(tenbo);
	fflush(stdin);
	
	printf("Nhap ten cua me ban: ");
	gets(tenme);
	
	printf("Nhap tuoi cua bo ban: ");
	scanf("%d", &tuoibo);
	
	printf("Nhap tuoi cua me ban: ");
	scanf("%d", &tuoime);
	
	printf("Bo ban ten %s - tuoi: %d\n", tenbo, tuoibo);
	printf("Me ban ten %s - tuoi: %d\n", tenme, tuoime);
}
